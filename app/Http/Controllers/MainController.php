<?php

namespace App\Http\Controllers;

use App\League;
use App\Team;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all();
        $articlesShow = $articles->where('status', '=', 'widoczny');
        $articlesSortDate = $articlesShow -> sortByDesc('created_at');
        $articlesSort = $articlesSortDate -> sortByDesc('important') ->take(4);
        $leagues = League::all() -> sortBy('name');
        $timetable = League::with('matches.teamHome', 'matches.teamEnemy')->get();

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

        $teams = Team::all();


        return view('home.home', ['articles' => $articlesSort, 'leagues'=>$leagues, 'timetable'=>$timetable->sortBy('name'), 'teams'=>$teams, 'mecze'=>$mecze]);
    }

    public function articles()
    {
        $articles = Article::all();
        $articlesSortDate = $articles -> sortByDesc('created_at');
        $articlesSort = $articlesSortDate -> sortByDesc('important');
        return view('home.articles.articles', ['articles' => $articlesSort]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public  function singleArticle($id){

        $article = Article::find($id);
        $articlesAll = Article::all();
        $articlesSort = $articlesAll -> sortByDesc('created_at') ->take(4);
        return view('home.articles.article', ['article' => $article, 'articlesAll' => $articlesSort]);
    }

    public function contact(){
        return view('home.contact');
    }

    public function pastSeason(){
        return view('home.season.season-past');
    }

    public function season(){
        $mecze = array();
        $meczeSQLQ = DB::table('matches')
            ->select('matches.id', 'league_id', 'home_team_id', 'enemy_team_id',
                (DB::raw("`home_team_score` AS `home_win`")),
                (DB::raw("`enemy_team_score` AS `enemy_win`")),
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

        $leaguesAll = League::all();
        $teams = Team::all();
        return view('home.season.season', ['mecze'=> $mecze, 'leaguesAll' => $leaguesAll, 'teams'=>$teams]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function team($id){
        $unionPlayer = DB::table('players')->where('team_id', '=', $id)->where('status', '=', 'zweryfikowany')->get();
        $teamDB = DB::table('teams')->where('teams.id', '=', $id)
            ->select((DB::raw("teams.name AS team_name")), DB::raw("teams.id AS team_id"), "users.name", 'teams.league_id', "users.id", "users.surname", 'teams.time', 'teams.address', 'teams.information', 'users.phone', 'users.email' , 'teams.logo')
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
            $teamTable['time'] = $team->time;
            $teamTable['information'] = $team->information;
            $teamTable['players'] = null;

            foreach($unionPlayer as $key => $player){
                $teamTable['players'][$player->id]['name'] = $player->name;
                $teamTable['players'][$player->id]['surname'] = $player->surname;
                $teamTable['players'][$player->id]['photo'] = $player->photo;
                $teamTable['players'][$player->id]['birth'] = $player->birth;
            }
        }
        $matchPastDB = DB::table('matches')->select('id', 'home_team_id', 'date', 'enemy_team_id', 'home_team_score', 'enemy_team_score')->where([
            ['status', '=', 'zaakceptowany'],
            ['home_team_id', '=', $id],
        ])
            ->orWhere([
                ['status', '=', 'zaakceptowany'],
                ['enemy_team_id', '=', $id],
            ])
            ->get();
        $matchPast = array();
        $teams = Team::all();
        foreach ($matchPastDB as $key => $match){
            $matchPast[$key]['match_id'] = $match->id;
            $matchPast[$key]['home_team'] = Team::find($match->home_team_id)->name;
            $matchPast[$key]['home_team_id'] = $match->home_team_id;
            $matchPast[$key]['enemy_team'] = Team::find($match->enemy_team_id)->name;
            $matchPast[$key]['enemy_team_id'] = $match->enemy_team_id;
            $matchPast[$key]['home_team_logo'] = Team::find($match->home_team_id)->logo;
            $matchPast[$key]['enemy_team_logo'] = Team::find($match->enemy_team_id)->logo;
            $matchPast[$key]['home_team_score'] = $match->home_team_score;
            $matchPast[$key]['enemy_team_score'] = $match->enemy_team_score;
            $matchPast[$key]['date'] = $match->date;
            $matchPast[$key]['details'] = array();

            foreach($match as $matchDetail){
                $temp = DB::table('match_details')->where('match_id' ,'=', $match->id)->select('home_points', 'enemy_points')->get();
                foreach ($temp as $keySet => $set){
                    $matchPast[$key]['details'][$keySet] = [$set->home_points, $set->enemy_points ];
                }
            }
        }

        $matchFutureDB = DB::table('matches')->select('id', 'home_team_id', 'date', 'enemy_team_id')->where([
            ['status', '!=', 'zaakceptowany'],
            ['home_team_id', '=', $id],
        ])
            ->orWhere([
                ['status', '!=', 'zaakceptowany'],
                ['enemy_team_id', '=', $id],
            ])
            ->get();

        $matchFuture = array();

        foreach ($matchFutureDB as $key => $match) {
            $matchFuture[$key]['match_id'] = $match->id;
            $matchFuture[$key]['home_team'] = Team::find($match->home_team_id)->name;
            $matchFuture[$key]['home_team_id'] = $match->home_team_id;
            $matchFuture[$key]['enemy_team'] = Team::find($match->enemy_team_id)->name;
            $matchFuture[$key]['enemy_team_id'] = $match->enemy_team_id;
            $matchFuture[$key]['home_team_logo'] = Team::find($match->home_team_id)->logo;
            $matchFuture[$key]['enemy_team_logo'] = Team::find($match->enemy_team_id)->logo;
            $matchFuture[$key]['date'] = $match->date;
            $matchFuture[$key]['address'] = Team::find($match->home_team_id)->address;
        }


        return view('home.teams.team', ['team'=>$teamTable, 'matchesPast'=>$matchPast, 'matchFuture' => $matchFuture]);
    }
}
