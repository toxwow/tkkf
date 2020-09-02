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
        return view('page.home', ['articles' => $articlesSort]);
    }

    public function articles()
    {
        $articles = Article::all();
        $articlesSort = $articles -> sortByDesc('created_at');
        return view('page.articles', ['articles' => $articlesSort]);
    }
}
