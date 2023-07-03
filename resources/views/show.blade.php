@extends('layouts.app')

@section('content')
        <div class="card p-3 mb-3">
                <h4 class="card-title">{{ $article->title }}</h4>

            <div>
                <span class="badge bg-dark">{{ $article->category->title }}</span>
                <span class="badge bg-dark">{{ $article->user->name }}</span>
                <span class="badge bg-dark">{{ $article->created_at->format('d M Y') }}</span>
            </div>
            <div class="mt-4">
                {{ $article->description}}
            </div>
        </div>
@endsection
