<?php

namespace App\Http\Controllers;

use App\League;
use App\User;
use App\Player;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class PlayerController extends Controller
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
        $leagues = League::with('team.players')->get();
        $user = Auth::user();
        return view('admin.players.players', ['user' => $user, 'leagues' => $leagues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        if($user -> isAdmin()) {
            $url = $request->team;
            $users = User::all();
            $teams = Team::all();
            return view('admin.players.players-add', ['user' => $user, 'users' => $users, 'teams' => $teams, 'selectTeam' => $url]);
        }
        else if($user -> isCapitan()){
            $team = array();
            $teamDB = DB::table('teams')->where('capitan', $user->id)
                ->join('leagues', 'teams.league_id', '=', 'leagues.id')
                ->select('teams.id', 'teams.name', DB::raw('leagues.name as league_name , leagues.id as league_id') )
                ->get();
            if(empty($teamDB[0])){
                $teamDB = DB::table('teams')->where('capitan', $user->id)
                    ->select('teams.id', 'teams.name' )
                    ->get();
            }
            foreach ($teamDB as $t) {
                $team["name"] = $t->name;
                $team["id"] = $t->id;


                if( isset($t->leauge_name)){
                    $team["league_id"] = $t->league_id;
                    $team["league"] = $t->league_name;
                }else{
                    $team["league"] = null;
                    $team["league_name"] = 'brak ligi - czekaj na dopisanie';
                }
            }

            return view('admin.players.players-add-capitan', ['user' => $user,  'team' => $team]);
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
        $user = Auth::user();
        if($user -> isAdmin()) {
            $request->validate([
                'name'=>'required',
                'surname'=>'required',
            ]);

            $photoImage =  $request->file('photo');
            if($photoImage === null){
                $player = new Player([
                    'name' => $request->get('name'),
                    'surname' => $request->get('surname'),
                    'photo' => 'default-player.png',
                    'birth' => $request->get('birth'),
                    'status' => 'zweryfikowany',
                    'team_id' => $request->get('team'),
                    'user_id' => $request->get('user'),
                ]);
            }
            else{
                Storage::putFile('public/images/players', $request->file('photo'));
                $player = new Player([
                    'name' => $request->get('name'),
                    'surname' => $request->get('surname'),
                    'photo' => $photoImage->hashName(),
                    'birth' => $request->get('birth'),
                    'status' => 'zweryfikowany',
                    'team_id' => $request->get('team'),
                    'user_id' => $request->get('user'),
                ]);
            }
            $player->save();
            return redirect('/druzyna')->with('success', 'Nowy zawodnik dodany!');
        }

        else if($user -> isCapitan()) {

            $request->validate([
                'name'=>'required',
                'surname'=>'required',
            ]);

            $team = array();

            $teamDB = DB::table('teams')->where('capitan', $user->id)
                ->join('leagues', 'teams.league_id', '=', 'leagues.id')
                ->select('teams.id', 'teams.name', DB::raw('leagues.name as league_name , leagues.id as league_id') )
                ->get();

            foreach ($teamDB as $t) {
                $team["name"] = $t->name;
                $team["id"] = $t->id;
                $team["league"] = $t->league_name;
                $team["league_id"] = $t->league_id;
            }





            $photoImage =  $request->file('photo');
            if($photoImage === null){
                $player = new Player([
                    'name' => $request->get('name'),
                    'surname' => $request->get('surname'),
                    'status' => 'niezweryfikowany',
                    'photo' => 'default-player.png',
                    'birth' => $request->get('birth'),
                    'team_id' => $team['id'],
                    'user_id' => $request->get('user'),
                ]);
            }
            else{
                Storage::putFile('public/images/players', $request->file('photo'));
                $player = new Player([
                    'name' => $request->get('name'),
                    'surname' => $request->get('surname'),
                    'status' => 'niezweryfikowany',
                    'photo' => $photoImage->hashName(),
                    'birth' => $request->get('birth'),
                    'team_id' => $team['id'],
                    'user_id' => $request->get('user'),
                ]);
            }

            $player->save();
            return redirect('/druzyna')->with('success', 'Nowy zawodnik dodany!');

        }

        else{
            abort(403, "Access denied");
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
        $player = Player::find($id);
        $users = User::all();
        $teams = Team::all();
        if($user -> isAdmin()){
            return view('admin.players.players-edit', ['user' => $user, 'users' => $users, 'teams' => $teams, 'player' => $player]);
        }
        else{
            abort('403', 'access denied');
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
        $player = Player::find($id);
        $player->name = $request->get('name');
        $player->surname = $request->get('surname');
        $player->status = $request->get('status');
        $player->birth = $request->get('birth');
        $player->team_id = $request->get('team');
        $player->user_id = $request->get('user');

        $player->save();

        return redirect('/druzyna')->with('success', 'Dane zawodnika zaktualizowane!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
//        Storage::delete('public/images/players/'.$player->photo);

    }
}
