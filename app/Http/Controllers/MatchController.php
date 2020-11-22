<?php

namespace App\Http\Controllers;

use App\League;
use App\Match;
use App\MatchDetail;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $hasTeam = DB::table('teams')->where('capitan', $user->id)->get();
        if(!($user->isAdmin()) && empty($hasTeam[0])){
            return view('admin.matches.matches-user', ['user' => $user, 'msg' => 'Nie masz drużyny']);
        }
        if(!($user->isAdmin()) && $hasTeam[0]->league_id == ''){
            return view('admin.matches.matches-user', ['user' => $user, 'msg' => 'Twoja drużyna nie jest przypisana do ligi']);
        }

        $test =  DB::table('teams')->where('teams.capitan', '=', $user->id)
            ->select('matches.id', (DB::raw("matches.home_team_id AS home_team")), (DB::raw("matches.enemy_team_id AS enemy_team")), 'matches.date', 'matches.status', 'matches.home_team_score', 'matches.enemy_team_score')
            ->join('matches', 'matches.enemy_team_id', '=', 'teams.id');

        $meczeCapitan = DB::table('teams')->where('teams.capitan', '=', $user->id)
        ->select('matches.id', (DB::raw("matches.home_team_id AS home_team")), (DB::raw("matches.enemy_team_id AS enemy_team")), 'matches.date', 'matches.status', 'matches.home_team_score', 'matches.enemy_team_score')
        ->join('matches', 'matches.home_team_id', '=', 'teams.id')
        ->union($test)->orderBy('date')->get();

        $selectTeam = DB::table('teams')->where('teams.capitan', '=', $user->id)
                        ->select('teams.name', (DB::raw("leagues.name AS league")), 'teams.id', 'teams.shifts')
                        ->join('leagues', 'leagues.id', '=', 'teams.league_id')
                        ->get();

        $leagues = League::with('matches.detail')->get();
        $teams = Team::all();

        if($user -> isAdmin()){
            $today = Carbon::today();
            return view('admin.matches.matches', ['user' => $user, 'leagues' => $leagues, 'teams'  => $teams, 'today' => $today] );
        }
        else if($user -> isCapitan()){
            $today = Carbon::now();

            return view('admin.matches.matches-capitan', ['user' => $user, 'leagues' => $leagues, 'teams'  => $teams, 'matches' => $meczeCapitan, 'selectTeam' => $selectTeam, 'today'=>$today] );
        }

        else{
            abort(403, 'access denied');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        if($user ->isAdmin()){
            $leagues = League::all();
            $teams = League::with('team')->get();
            return view('admin.matches.matches-add', ['user'=> $user, 'teams' => $teams, 'leagues' => $leagues]);
        }
        else{
            abort(403, 'access denied');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user ->isAdmin()){
            $request->validate([
                'league'=>'required',
            ]);


            $match = new Match([
                'league_id' => $request->get('league'),
                'home_team_id' => $request->get('teamHome'),
                'enemy_team_id' => $request->get('teamAway'),
                'date' => $request->get('date'),
                'status' => $request->get('status'),
                'home_team_score' => $request->get('teamHomeScore'),
                'enemy_team_score' => $request->get('teamAwayScore'),
            ]);

            $match->save();

            if($request->get('enemyPointSet1') && $request->get('homePointSet1') != null ){
                $matchDetail = new MatchDetail([
                    'match_id' => $match->id,
                    'set' => '1',
                    'home_points' => $request->get('homePointSet1'),
                    'enemy_points' => $request->get('enemyPointSet1'),
                ]);
                $matchDetail->save();
            }
            if($request->get('enemyPointSet2') && $request->get('homePointSet2') != null ){

                $matchDetail = new MatchDetail([
                    'match_id' => $match->id,
                    'set' => '2',
                    'home_points' => $request->get('homePointSet2'),
                    'enemy_points' => $request->get('enemyPointSet2'),
                ]);
                $matchDetail->save();
            }
            if($request->get('enemyPointSet3') && $request->get('homePointSet3') != null ){

                $matchDetail = new MatchDetail([
                    'match_id' => $match->id,
                    'set' => '3',
                    'home_points' => $request->get('homePointSet3'),
                    'enemy_points' => $request->get('enemyPointSet3'),
                ]);
                $matchDetail->save();
            }



            return redirect('/mecze')->with('success', 'Nowy mecz dodany!');
        }
        else{
            abort(403, 'access denied');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if($user -> isAdmin()){
            $leagues = League::all();
            $teams = League::with('team')->get();
            $match = Match::find($id);
            $matchDetail = MatchDetail::where('match_id', $match->id)->get();
            return view('admin.matches.matches-edit', ['user' => $user, 'teams' => $teams, 'leagues' => $leagues, 'match' => $match, 'matchDetail' => $matchDetail]);
        }
        else if($user -> isCapitan()){
            $leagues = League::all();
            $teams = League::with('team')->get();
            $match = Match::find($id);
            $matchDetail = MatchDetail::where('match_id', $match->id)->get();
            $accessMatch = DB::table('matches')->where('matches.id', '=', $id)
                ->join('teams', 'matches.home_team_id', '=', 'teams.id')
                ->select('capitan')
                ->get();
            if(($user->id === $accessMatch[0]->capitan) || ($match->status == 'niezaakceptowany')){
                return view('admin.matches.matches-edit', ['user' => $user, 'teams' => $teams, 'leagues' => $leagues, 'match' => $match, 'matchDetail' => $matchDetail]);
            }
            else{
                abort(403, "Access denied");
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $match = Match::find($id);
        if($request->ajax()){
            $match->status = $request->get('status');
            $match->save();
        }
        else {
            $user = Auth::user();
            $match->league_id = $request->get('league');
            $match->home_team_id = $request->get('teamHome');
            $match->enemy_team_id = $request->get('teamAway');
            $match->date = $request->get('date');

            if ($user->isCapitan()) {
                $match->status = 'niezaakceptowany';
            } else if ($user->isAdmin()) {
                $match->status = $request->get('status');
            }
            $match->home_team_score = $request->get('teamHomeScore');
            $match->enemy_team_score = $request->get('teamAwayScore');


            if ($request->get('enemyPointSet1') && $request->get('homePointSet1') != null) {

                $matchDetailFind = MatchDetail::where('match_id', $match->id)->where('set', '1')->first();
                if ($matchDetailFind != null) {
                    $matchDetail = MatchDetail::find($matchDetailFind->id);
                    $matchDetail->home_points = $request->get('homePointSet1');
                    $matchDetail->enemy_points = $request->get('enemyPointSet1');
                    $matchDetail->save();
                } else {
                    $matchDetail = new MatchDetail([
                        'match_id' => $match->id,
                        'set' => '1',
                        'home_points' => $request->get('homePointSet1'),
                        'enemy_points' => $request->get('enemyPointSet1'),
                    ]);
                    $matchDetail->save();
                }
            }
            if ($request->get('enemyPointSet2') && $request->get('homePointSet2') != null) {

                $matchDetailFind = MatchDetail::where('match_id', $match->id)->where('set', '2')->first();
                if ($matchDetailFind != null) {
                    $matchDetail = MatchDetail::find($matchDetailFind->id);
                    $matchDetail->home_points = $request->get('homePointSet2');
                    $matchDetail->enemy_points = $request->get('enemyPointSet2');
                    $matchDetail->save();
                } else {
                    $matchDetail = new MatchDetail([
                        'match_id' => $match->id,
                        'set' => '2',
                        'home_points' => $request->get('homePointSet2'),
                        'enemy_points' => $request->get('enemyPointSet2'),
                    ]);
                    $matchDetail->save();
                }
            }

            if ($request->get('enemyPointSet3') && $request->get('homePointSet3') != null) {
                $matchDetailFind = MatchDetail::where('match_id', $match->id)->where('set', '3')->first();
                if ($matchDetailFind != null) {
                    $matchDetail = MatchDetail::find($matchDetailFind->id);
                    $matchDetail->home_points = $request->get('homePointSet3');
                    $matchDetail->enemy_points = $request->get('enemyPointSet3');
                    $matchDetail->save();
                } else {
                    $matchDetail = new MatchDetail([
                        'match_id' => $match->id,
                        'set' => '3',
                        'home_points' => $request->get('homePointSet3'),
                        'enemy_points' => $request->get('enemyPointSet3'),
                    ]);
                    $matchDetail->save();
                }

            }
            if (empty($request->get('enemyPointSet3')) && empty($request->get('homePointSet3'))) {
                $matchDetailFind = MatchDetail::where('match_id', $match->id)->where('set', '3')->first();
                if ($matchDetailFind != null) {
                    $matchDetail = MatchDetail::find($matchDetailFind->id);
                    $matchDetail->delete();
                }
            }

            if ($user->isAdmin()) {
                if ($match->status === 'nieodbyty') {
                    $match->home_team_score = '';
                    $match->enemy_team_score = '';
                    $matchDetailFind1 = MatchDetail::where('match_id', $match->id)->where('set', '1')->first();
                    $matchDetailFind2 = MatchDetail::where('match_id', $match->id)->where('set', '2')->first();
                    $matchDetailFind3 = MatchDetail::where('match_id', $match->id)->where('set', '3')->first();
                    if ($matchDetailFind1 != null) {
                        $matchDetail = MatchDetail::find($matchDetailFind1->id);
                        $matchDetail->delete();
                    }
                    if ($matchDetailFind2 != null) {
                        $matchDetail = MatchDetail::find($matchDetailFind2->id);
                        $matchDetail->delete();
                    }
                    if ($matchDetailFind3 != null) {
                        $matchDetail = MatchDetail::find($matchDetailFind3->id);
                        $matchDetail->delete();
                    }
                }
            }
            $match->save();
        }

        return redirect('/mecze')->with('success', 'Mecz zaktualizowany!');


    }

    /**
     * .
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @param  int $home
     * @param  int $enemy
     * @return \Illuminate\Http\Response
     */

    public function shift($id, $home, $enemy){
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Match::find($id);
        $match->delete();

        return redirect('/mecze')->with('success', 'Mecz usunięty!');
    }
}
