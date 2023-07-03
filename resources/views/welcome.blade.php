@extends('layouts.app')

@section('content')
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
@endsection
