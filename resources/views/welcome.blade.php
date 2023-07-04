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
            @foreach ($articles as $article)
        <div class="card p-3 mb-3">
            <a href="{{ route('detail',$article->id) }}" class=" text-decoration-none text-dark">
                <h4 class="card-title">{{ $article->title }}</h4>
            </a>
            <div>
                <span class="badge bg-dark">{{ $article->category->title }}</span>
                <span class="badge bg-dark">{{ $article->user->name }}</span>
                <span class="badge bg-dark">{{ $article->created_at->format('d M Y') }}</span>
            </div>
            <div class="mt-4">
                {{ Str::words($article->description, 50, '...') }}
            </div>
        </div>
    @endforeach
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
        </div>
    </div>
    {{ $articles->links() }}
@endsection
