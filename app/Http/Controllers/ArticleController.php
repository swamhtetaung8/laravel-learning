<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::when(Auth::user()->role !== 'admin', fn ($q) => $q->where('user_id', Auth::id()))->paginate(10);
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->user_id = Auth::id();
        $article->category_id = $request->category;
        $article->save();

        return redirect()->route('article.index')->with('status', 'Successfully created article');
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
        // Gate::authorize('article-update', $article);
        $this->authorize('update', $article);
        $categories = Category::all();
        return view('article.edit', ['article' => $article, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        // if (!Gate::allows('article-update', $article)) {
        //     return abort(403, 'Cannot allow you motherfucker.');
        // };

        // Gate::authorize('article-update', $article);
        $this->authorize('update', $article);
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->description = $request->description;
        $article->update();

        return redirect()->route('article.index')->with('status', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return redirect()->back()->with('status', 'Article deleted successfully');
    }
}
