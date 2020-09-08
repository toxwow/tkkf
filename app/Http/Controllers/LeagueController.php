<?php

namespace App\Http\Controllers;

use App\League;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeagueController extends Controller
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


        $mecze = array();
        $meczeSQLQ = DB::table('matches')
            ->select('matches.id', 'league_id', 'home_team_id', 'enemy_team_id',
                (DB::raw("SUM(`home_team_score` > `enemy_team_score`) AS `home_win`")),
                (DB::raw("SUM(`home_team_score` < `enemy_team_score`) AS `enemy_win`")),
                (DB::raw("SUM(`home_points`) AS `home_sum_points`")),
                (DB::raw("SUM(`enemy_points`) AS `enemy_sum_points`")))
            ->from('matches')->join('match_details', 'matches.id', '=', 'match_details.match_id')
            ->where('matches.status',  '=', 'zaakceptowany')
            ->groupBy('match_details.match_id')
            ->get();

        $druzyny = DB::table('teams')->get();
        foreach($druzyny as $druzyna){

            $mecze[$druzyna->league_id][$druzyna->id]['libcza_meczy'] = 0;
            $mecze[$druzyna->league_id][$druzyna->id]['win'] = 0;
            $mecze[$druzyna->league_id][$druzyna->id]['lose'] = 0;
            $mecze[$druzyna->league_id][$druzyna->id]['sum_point_win'] = 0;
            $mecze[$druzyna->league_id][$druzyna->id]['sum_points_match'] = 0;
            $mecze[$druzyna->league_id][$druzyna->id]['win_total'] = 0;
            $mecze[$druzyna->league_id][$druzyna->id]['lose_total'] = 0;
            $mecze[$druzyna->league_id][$druzyna->id]['sum_point_lose'] = 0;
        }

        foreach ($meczeSQLQ as $meczSQL) {

            if ($meczSQL->home_win > $meczSQL->enemy_win){
                $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['win_total'] += 1;
                $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['lose_total'] += 1;
                if ($meczSQL->enemy_win == 1){
                    $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['sum_points_match'] += 1;
                    $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['sum_points_match'] += 2;
                }
                else{
                    $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['sum_points_match'] += 3;
                }
            }
            else{
                $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['win_total'] += 1;
                $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['lose_total'] += 1;

                if ($meczSQL->home_win == 1){
                    $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['sum_points_match'] += 2;
                    $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['sum_points_match'] += 1;

                }
                else{
                    $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['sum_points_match'] += 3;

                }
            }

            $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['libcza_meczy'] += 1;
            $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['win'] += $meczSQL->home_win;
            $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['lose'] += $meczSQL->enemy_win;
            $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['sum_point_win'] += $meczSQL->home_sum_points;
            $mecze[$meczSQL->league_id][$meczSQL->home_team_id]['sum_point_lose'] += $meczSQL->enemy_sum_points;

            $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['libcza_meczy'] += 1;
            $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['win'] += $meczSQL->enemy_win;
            $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['lose'] += $meczSQL->home_win;
            $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['sum_point_win'] += $meczSQL->enemy_sum_points;
            $mecze[$meczSQL->league_id][$meczSQL->enemy_team_id]['sum_point_lose'] += $meczSQL->home_sum_points;


        }



        foreach ($mecze as $leagueKey => $leagueItem){
            uasort($mecze[$leagueKey],
                function($a, $b){
                    if ($a['sum_points_match'] == $b['sum_points_match'] ) {
                        if ($a['win'] == $b['win'] ){
                            return ($a['sum_point_win'] - $a['sum_point_lose'] < $b['sum_point_win'] + $b['sum_point_lose'] ) ? 1 : -1;
                        }
                        return ($a['win']  < $b['win'] ) ? 1 : -1;
                    }
                    return ($a['sum_points_match']  < $b['sum_points_match'] ) ? 1 : -1;
        });}


        $leagues = League::all();
        $teams = Team::all();
        $user = Auth::user();
        return view('admin.leagues.leagues', ['user' => $user, 'leagues' => $leagues, 'teams' => $teams, 'mecze' => $mecze]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->isAdmin()) {
            $user = Auth::user();
            return view('admin.leagues.leagues-add', ['user' => $user]);
        }
        else{
            abort(403, "Access denied");
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
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'name' => 'required',
            ]);


            $league = new League([
                'name' => $request->get('name'),
            ]);
            $league->save();
            return redirect('/druzyna')->with('success', 'Nowa liga dodana!');
        }
        else{
            abort(403, "Access denied");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\League  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $league = League::find($id);
        return view('page.leagues', compact('league'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\League  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->isAdmin()) {
            $league = League::find($id);
            $user = Auth::user();
            return view('admin.leagues.leagues-edit', compact('league', 'user'));
        }
        else{
            abort(403, "Access denied");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\League  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'name' => 'required',
            ]);

            $league = League::find($id);
            $league->name = $request->get('name');
            $league->save();

            return redirect('/druzyna')->with('success', 'Liga zaktualizowana!');
        }
        else{
            abort(403, "Access denied");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\League  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->isAdmin()) {
            $league = League::find($id);
            $league->delete();

            return redirect('/liga')->with('success', 'Liga usunięta prawidłowo!');
        }
        else{
            abort(403, "Access denied");
        }
    }
}
