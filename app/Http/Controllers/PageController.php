<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class PageController extends Controller
{
    public function index()
    {
        $articles = Article::when(request()->has('keyword'), function ($query) {
            $query->where(function (Builder $builder) {
                $keyword = request()->keyword;
                $builder->where('title', 'LIKE', "%$keyword%");
                $builder->orWhere('description', 'LIKE', "%$keyword%");
            });
        })->paginate(10)->withQueryString();
        return view('welcome', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('show', compact('article'));
    }

    public function categorized($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $articles = $category->articles()->paginate(10)->withQueryString();
        return view('welcome', compact('articles'));
    }
}
