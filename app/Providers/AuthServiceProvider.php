<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Policies\ArticlePolicy;
use App\Policies\CategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
        Article::class => ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::define('article-update', function (User $user, Article $article) {
        //     return $user->id == $article->user_id;
        // });
        // Gate::define('article-delete', function (User $user, Article $article) {
        //     return $user->id == $article->user_id;
        // });
        // Gate::before(function (User $user) {
        //     if ($user->id == 1) {
        //         return true;
        //     }
        // });
    }
}
