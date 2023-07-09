@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if (request()->has('keyword'))
                <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="mb-0">Showing search result of '{{ request()->keyword }}'</p>
                <a href="{{ route('page.home') }}" class="text-dark">Show all</a>
            </div>
            @endif
            @forelse ($articles as $article)
        <div class="card p-3 mb-3">
            <a href="{{ route('detail',$article->slug) }}" class=" text-decoration-none text-dark">
                <h4 class="card-title">{{ $article->title }}</h4>
            </a>
            <div>
                <span class="badge bg-dark">{{ $article->category->title }}</span>
                <span class="badge bg-dark">{{ $article->user->name }}</span>
                <span class="badge bg-dark">{{ $article->created_at->format('d M Y') }}</span>
            </div>
            <div class="mt-4">
                {{ $article->excerpt }}
            </div>
        </div>
        @empty
        <div class="card p-3 mb-3">
            <h4 class="mb-0">No articles exist</h4>
        </div>
    @endforelse
        </div>
        <div class="col-lg-4">
            <h5>Article Search</h5>
            <form action="{{ route('page.home') }}">
            <div class="input-group">
                    <input type="text" name="keyword" class="form-control" value="{{ request()->keyword }}">
                    <button class="btn btn-dark">
                        <i class=" bi bi-search"></i>
                    </button>
                </div>
            </form>
            <h5 class="mt-5">Categories</h5>
            <ul class=" list-group">
                <a href="{{ route('page.home') }}" class=" list-group-item list-group-item-action" role="button">
                      All
                    </a>
                @foreach (App\Models\Category::all() as $category)
                    <a href="{{ route('categorized',$category->slug) }}" class=" list-group-item list-group-item-action" role="button">
                      {{ $category->title }}
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
    {{ $articles->links() }}
@endsection
