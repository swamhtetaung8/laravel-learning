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

            <h5 class="mt-5">Comments</h5>
            @auth
                @forelse ($article->comments as $comment)
            <div class=" p-3 border rounded my-2">
                <p class="mb-0">
                    <span>{{ $comment->user->name }}</span>
                    -
                    <span>{{ $comment->created_at->diffforhumans() }}</span>
                </p>
                <p class="mt-2 mb-0 p-2 rounded border">{{ $comment->body }}</p>
            </div>
                @empty
                <div class=" p-3 border rounded my-2">

                    No comments yet.
                </div>
                @endforelse
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <textarea id="" cols="30" rows="5" class=" form-control @error('body')
                        is-invalid
                    @enderror" name="body" placeholder="Say something about this article."></textarea>
                    @error('body')
                        <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input type="hidden" value="{{ $article->id }}" name="article_id">
                    <div class="my-2 d-flex justify-content-between">
                        <p>Commenting as {{ Auth::user()->name }}</p>
                        <button class=" btn btn-dark">Comment</button>
                    </div>
                </form>
            @endauth
            @guest
                <p>{{ $article->comments->count() }} comments, login to see and comment <a class=" d-inline-block" href="{{ route('login') }}">Here</a></p>
            @endguest
        </div>
@endsection
