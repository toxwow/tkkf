<?php

namespace App\Http\Controllers;

use App\Mail\CreateUserByAdmin;
use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
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
            $users = array();
            $usersHasTeam = DB::table('users')
                ->select((DB::raw("teams.name AS team_name")), "users.name", "users.id", "users.surname", "users.phone", "users.email", 'users.last_seen')
                ->join('teams', 'teams.capitan', '=', 'users.id')
                ->get();
            $usersAll = DB::table('users')->get();
            foreach ($usersAll as $userAll) {
                $users[$userAll->id]["name"] = $userAll->name . ' ' . $userAll->surname;
                $users[$userAll->id]["phone"] = $userAll->phone;
                $users[$userAll->id]["email"] = $userAll->email;
                $users[$userAll->id]["team"] = 'brak';
                $users[$userAll->id]["role"] = $userAll->role;
                $users[$userAll->id]["last_seen"] = $userAll->last_seen;
                $users[$userAll->id]["online"] = User::find($userAll->id)->isOnline();
            }

            foreach ($usersHasTeam as $userHasTeam) {
                $users[$userHasTeam->id]["team"] = $userHasTeam->team_name;
            }

            return view('admin.users.users', ['user' => $user, 'users' => $users]);
        }

        else{
            abort(403, "Access denied");
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
        if($user -> isAdmin()){
            return view('admin.users.users-add', ['user' => $user]);
        }
        else{
            abort('403', 'brak uprawnień');
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
        $random_password = Str::random(10);
        $hashed_random_password = Hash::make($random_password);
        $email = $request->get('email');

        if($user -> isAdmin()) {
            $request->validate([
                'name'=>'required',
                'surname'=>'required',
                'role'=>'required',
                'email'=>'required',
            ]);

            $newUser = new User([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'password' => $hashed_random_password,
                'role' => $request->get('role'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone')
            ]);
//            Mail::to($request->get('email'))->send(new CreateUserByAdmin($random_password, $email));
            $newUser->save();
            return redirect('/uzytkownicy')->with('success', 'Użytkownik dodana!');
        }
        else{
            abort('403', 'access denied');
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
        $user = Auth::user();
        $selectUser = User::find($id);
        $userSelectTeam = DB::table('teams')->where('capitan', '=', $selectUser->id)->first();
        if($user->id == $selectUser->id){
            $sameUser = true;
        }
        else{
            $sameUser = false;
        }

            return view('admin.users.users-show', ['user' => $user, 'selectUser'=>$selectUser, 'sameUser' => $sameUser, 'selectTeam' =>$userSelectTeam]);

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
        $selectUser = User::find($id);
        if($user -> isAdmin()){
            return view('admin.users.users-edit', ['user' => $user, 'selectUser'=>$selectUser]);
        }
        if($user->id == $id){
            return view('admin.users.users-edit', ['user' => $user, 'selectUser'=>$selectUser]);
        }
        else{
            abort('403', 'brak uprawnień');
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
        $user = Auth::user();
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',
        ]);
        $newUser = User::find($id);
        $newUser->name = $request->get('name');
        $newUser->surname = $request->get('surname');
        $newUser->phone = $request->get('phone');
        $newUser->email = $request->get('email');
        if(empty($request->get('new_password'))){

        }
        else{
            $newUser->password = Hash::make($request->get('new_password'));
        }
        if($user->isAdmin()){
            $newUser->role = $request->get('role');
        }
        $newUser->save();
        if($user->isAdmin()){
            return redirect('/uzytkownicy')->with('success', 'Użytkownik zaktalizowany!');
        }
        else if($user->isCapitan()){
            return redirect('/uzytkownicy/'.$user->id)->with('success', 'Twój profil został zaktalizowany!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
