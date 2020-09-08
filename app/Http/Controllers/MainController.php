<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

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
        $articlesSort = $articles -> sortByDesc('created_at') ->take(3);
        return view('home.home', ['articles' => $articlesSort]);
    }

    public function articles()
    {
        $articles = Article::all();
        $articlesSort = $articles -> sortByDesc('created_at');
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
}
