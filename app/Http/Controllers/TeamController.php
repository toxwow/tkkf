<?php

namespace App\Http\Controllers;

use App\League;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
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
        if($user -> isAdmin()) {

            $league = League::with('team.players')->get();
            $emptyTeams = DB::table('teams')->where('league_id', '=', NULL)->get();
            return view('admin.teams.teams', ['user' => $user, 'leagues' => $league, 'emptyTeams' => $emptyTeams]);
        }
        else {
            $team = array();
            $teamDB = DB::table('teams')->where('capitan', $user->id)
                ->join('leagues', 'teams.league_id', '=', 'leagues.id')
                ->select('teams.id', 'teams.name', 'teams.logo', 'teams.date', 'teams.information', 'teams.capitan', DB::raw('leagues.name as leauge_name') )
                ->get();
            if(empty($teamDB[0])){
                $teamDB = DB::table('teams')->where('capitan', $user->id)
                    ->select('teams.id', 'teams.name', 'teams.logo', 'teams.date', 'teams.information', 'teams.capitan')
                    ->get();
            }
                $players = DB::table('players')->where('team_id', $teamDB[0]->id )->get();
                foreach ($teamDB as $t){
                    $team["name"] = $t->name;
                    $team["id"] = $t->id;

                    if( isset($t->leauge_name)){
                        $team["league"] = $t->leauge_name;
                    }else{

                        $team["league"] = 'brak ligi - czekaj na dopisanie';
                    }
                    $team["logo"] = $t->logo;
                    $team["date"] = $t->date;
                    $team["information"] = $t->information;
                    $team["capitan"] = $t->capitan;
                    $team["players"] = array();
                    foreach ($players as $key => $player){
                        $team["players"][$key]['id'] = $player->id;
                        $team["players"][$key]['name'] = $player->name .' '. $player -> surname;
                        $team["players"][$key]['photo'] = $player->photo;
                        $team["players"][$key]['status'] = $player->status;
                        $team["players"][$key]['birth'] = $player->birth;
                    }
                }
                return view('admin.teams.teamCapitan', ['user' => $user, 'team' => $team]);
            }


        }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $url = $request->league;
        $user = Auth::user();
        $league = League::all();
        if($user -> isAdmin()){
            return view('admin.teams.teams-add', ['user' => $user, 'league' => $league, 'league_selected' => $url]);
        }
        else{
            abort('403', 'access denied');
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
        $request->validate([
            'name'=>'required',
            'information'=>'required',
        ]);



        $team = new Team([
            'name' => $request->get('name'),
            'information' => $request->get('information'),
            'league_id' => $request->get('league_id')
        ]);
        $team->save();
        return redirect('/liga')->with('success', 'Drużyna dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);

        return view('page.teams', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $team = Team::find($id);
        $league = League::all();
        if($user -> isAdmin()){
            return view('admin.teams.teams-edit', ['user' => $user, 'team' => $team, 'league' => $league]);
        }
        else if($user -> isCapitan()){
            if($user->id === $team->capitan){
                return view('admin.teams.teams-edit-capitan', ['user' => $user, 'team' => $team, 'league' => $league]);
            }
            else{
                abort(403, "Access denied");
            }

        }
        else{
            abort(403, "Access denied");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $id
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $user = Auth::user();
        $team = Team::find($id);
        $team->name = $request->get('name');
        $team->information = $request->get('information');
        if($user -> isAdmin()){
            $team->league_id = $request->get('league_id');
        }
        $team->date = $request->get('date');
        $team->address = $request->get('address');
        $team->save();

        return redirect('/druzyna')->with('success', 'Drużyna zakutalizowana!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();

        return redirect('/liga')->with('success', 'Drużyna usunięta!');
    }
}
