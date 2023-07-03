<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);
        return view('welcome', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('show', compact('article'));
    }
}
