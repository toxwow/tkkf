<?php

namespace App\Http\Controllers;

use App\League;
use App\Mail\ChangeInformationTeam;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
            $hasTeam = DB::table('teams')->where('capitan', $user->id)->get();
            if(empty($hasTeam[0])){
                return view('admin.teams.teamUser', ['user' => $user]);
            }
            else{
                $team = array();
                $teamDB = DB::table('teams')->where('capitan', $user->id)
                    ->join('leagues', 'teams.league_id', '=', 'leagues.id')
                    ->select('teams.id', 'teams.name', 'teams.logo', 'teams.time', 'teams.shifts', 'teams.address', 'teams.information', 'teams.capitan', DB::raw('leagues.name as leauge_name') )
                    ->get();
                if(empty($teamDB[0])){
                    $teamDB = DB::table('teams')->where('capitan', $user->id)
                        ->select('teams.id', 'teams.name', 'teams.logo', 'teams.shifts', 'teams.address', 'teams.time', 'teams.information', 'teams.capitan')
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
                    $team["date"] = $t->time;
                    $team["address"] = $t->address;
                    $team["shifts"] = $t->shifts;
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
            $usersTeams = array();
            $usersCapitans = DB::table('users')
                ->select((DB::raw("teams.name AS team_name")), "users.name", "users.id", "users.surname")
                ->join('teams', 'teams.capitan', '=', 'users.id')
                ->get();
            $usersAll = DB::table('users')->get();
            foreach ($usersAll as $userAll){
                $usersTeams[$userAll->id]["name"] = $userAll->name.' '.$userAll->surname;
                $usersTeams[$userAll->id]["team"] = 'brak';
                $usersTeams[$userAll->id]["role"] = $userAll->role;
            }

            foreach ($usersCapitans as $usersCapitan){
                $usersTeams[$usersCapitan->id]["team"] = $usersCapitan->team_name;
            }

            return view('admin.teams.teams-add', ['user' => $user, 'league' => $league, 'league_selected' => $url, 'usersTeams' => $usersTeams]);
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
            'capitan'=>'required|nullable',
        ]);



        $team = new Team([
            'name' => $request->get('name'),
            'league_id' => $request->get('league_id'),
            'capitan' => $request->get('capitan'),
            'time' => $request->get('time'),
            'address' => $request->get('address'),
            'information' => $request->get('information'),
        ]);
        $team->save();
        return redirect('/druzyna')->with('success', 'Drużyna dodana!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        $unionPlayer = DB::table('players')->where('team_id', '=', $id)->where('status', '=', 'zweryfikowany')->get();
        $teamDB = DB::table('teams')->where('teams.id', '=', $id)
            ->select((DB::raw("teams.name AS team_name")), DB::raw("teams.id AS team_id"), "users.name", "teams.shifts", 'teams.league_id', "users.id", "users.surname", 'teams.time', 'teams.address', 'teams.information', 'users.phone', 'users.email' , 'teams.logo')
            ->join('users', 'users.id', '=', 'teams.capitan')
            ->get();
        $teamTable = array();
        foreach ($teamDB as $team){
            $teamTable['capitan'] = $team->name. ' '. $team->surname;
            $teamTable['capitan_id'] = $team->id;
            $teamTable['email'] = $team->email;
            $teamTable['phone'] = $team->phone;
            $teamTable['team'] = $team->team_name;
            $teamTable['team_league'] = League::find($team->league_id)->name;
            $teamTable['team_league_id'] = $team->league_id;
            $teamTable['team_id'] = $team->team_id;
            $teamTable['team_logo'] = $team->logo;
            $teamTable['address'] = $team->address;
            $teamTable['date'] = $team->time;
            $teamTable['shifts'] = $team->shifts;
            $teamTable['information'] = $team->information;
            $teamTable['players'] = null;

            foreach($unionPlayer as $key => $player){
                $teamTable['players'][$player->id]['name'] = $player->name;
                $teamTable['players'][$player->id]['surname'] = $player->surname;
                $teamTable['players'][$player->id]['photo'] = $player->photo;
                $teamTable['players'][$player->id]['birth'] = $player->birth;
            }
        }
        $team = Team::find($id);

        return view('admin.teams.teams-show', ['team' => $teamTable, 'user' => $user]);
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
        $matchStatusUnion = DB::table('matches')->where('enemy_team_id', '=', $team->id);
        $matchStatus = DB::table('matches')->where('home_team_id', '=', $team->id)->union($matchStatusUnion)->get();
        $matchStatus = empty($matchStatus[0]);
        $league = League::all();
        if($user -> isAdmin()){
                $usersTeams = array();
                $usersCapitans = DB::table('users')
                    ->select((DB::raw("teams.name AS team_name")), "users.name", "users.id", "users.surname")
                    ->join('teams', 'teams.capitan', '=', 'users.id')
                    ->get();
                $usersAll = DB::table('users')->get();
                foreach ($usersAll as $userAll){
                    $usersTeams[$userAll->id]["name"] = $userAll->name.' '.$userAll->surname;
                    $usersTeams[$userAll->id]["team"] = 'brak';
                    $usersTeams[$userAll->id]["role"] = $userAll->role;
                    $usersTeams[$userAll->id]["id"] = $userAll->id;
                }

                foreach ($usersCapitans as $usersCapitan){
                    $usersTeams[$usersCapitan->id]["team"] = $usersCapitan->team_name;
                }
            return view('admin.teams.teams-edit', ['user' => $user, 'team' => $team, 'league' => $league, 'matchStatus'=>$matchStatus, 'usersTeams' => $usersTeams]);
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

        ]);
        $user = Auth::user();
        $team = Team::find($id);
        if($user -> isCapitan()){
            if($request->ajax()){
                $team->shifts = $team->shifts + 1;
            }
            else if($team->time != $request->get('time') || $team->address != $request->get('address')){
                $mailsTo = 'tomasz.tomzynski@gmail.com';
                    Mail::to($mailsTo)->send(new ChangeInformationTeam($team));
            }
        }

        if($user -> isAdmin()){
            $team->name = $request->get('name');
            $team->league_id = $request->get('league_id');
            $team->shifts = $request->get('shifts');
            $team->capitan = $request->get('capitan');
            $team->time = $request->get('time');
            $team->address = $request->get('address');
            $team->information = $request->get('information');
        }
        if($user -> isCapitan()){
            $photoImage =  $request->file('logo');
            if($photoImage != null){
                if($team->logo != ''){
                    Storage::delete('public/images/teams/'.$team->logo);
                }
                Storage::putFile('public/images/teams', $request->file('logo'));
                $team->logo = $photoImage->hashName();
            }

            $team->time = $request->get('time');
            $team->address = $request->get('address');
            $team->information = $request->get('information');
        }


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
    }
}
