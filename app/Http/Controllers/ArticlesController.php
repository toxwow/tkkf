<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
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


    public function main()
    {

            $user = Auth::user();
            if($user -> isAdmin()){
                return view('admin.articles.articles-add', ['user' => $user]);
            }
            else{
                abort(403, "Access denied");
            }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if(Auth::user() -> isAdmin()) {
            $user = Auth::user();
            $articles = Article::orderByDesc('id')->paginate(5);
            $links = $articles->appends(['sort' => 'id'])->links();

            return view('admin.articles.articles', ['user' => $user, 'articles' => $articles, 'links' => $links]);
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
                'category' => 'required',
                'name' => 'required',
                'content' => 'required',
            ]);


            $article = new Article([
                'category' => $request->get('category'),
                'name' => $request->get('name'),
                'content' => $request->get('content'),
                'author' => $request->get('author')
            ]);
            $article->save();
            return redirect('/artykuly')->with('success', 'Artykul dodany!');
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
        $article = Article::find($id);
        return view('page.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->isAdmin()) {
            $user = Auth::user();
            $article = Article::find($id);
            return view('admin.articles.articles-edit', compact('article', 'user'));
        }
        else{
            abort(403, "Access denied");
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
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'category' => 'required',
                'name' => 'required',
                'content' => 'required'
            ]);

            $article = Article::find($id);
            $article->category = $request->get('category');
            $article->name = $request->get('name');
            $article->content = $request->get('content');
            $article->author = $request->get('author');
            $article->save();

            return redirect('/artykuly')->with('success', 'Artykuł zaktualizowany!');
        }
        else{
            abort(403, "Access denied");
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
        if (Auth::user()->isAdmin()) {
            $article = Article::find($id);
            $article->delete();

            return redirect('/artykuly')->with('success', 'Artykuł usunięty!');
        }
        else{
            abort(403, "Access denied");
        }

    }
}
