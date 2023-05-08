<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WriterController extends Controller
{
    public function dashboard(){
        $acceptedArticles = Article::where('user_id', Auth::user()->id)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        $rejectedArticles = Article::where('user_id', Auth::user()->id)->where('is_accepted', false)->orderBy('created_at', 'desc')->get();
        $unrevisionedArticles = Article::where('user_id', Auth::user()->id)->where('is_accepted', NULL)->orderBy('created_at', 'desc')->get();

        return view('writer.dashboard', compact('acceptedArticles', 'rejectedArticles', 'unrevisionedArticles'));
    }



    public function update(Request $request, Article $article )
    {
        return view('article.update', compact('article')); 
    }
}