<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;



class ArticleController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index', 'show');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
         return view('article.index', compact('articles'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        {
            return view('article.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|unique:articles|min:5',
            'body' => 'required|min:10',
            'image' => 'image|required',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $request->file('image')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
        ]);

        $tags = explode(', ', $request->tags);
        
        foreach ($tags as $tag){
            $newtag = Tag::updateOrCreate([
                'name' => $tag,

            ]);
            $article->tags()->attach($newtag);
        }

        return redirect(route('homepage'))->with('massage', 'Articolo Creato Corretamente');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag){
            $article->tags()->detach($tag);
        }
        $article->delete();

        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente cancellato l\'articolo scelto');
    }

    public function byCategory(Category $category) {
        $articles = $category->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.categoria', compact('category', 'articles'));
    }

    public function byUser(User $user) {
        $articles = $user->articles()->latest();
        return view('article.by-user', compact('user', 'articles'));
    }

    public function byWrither(User $user) {
        $articles = $user->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.by-user', compact('user', 'articles'));
    }

    
    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.search-index', compact('articles', 'query'));
        
    }
}
