@extends('layouts.app')

@section('content')

<h2>Article Detail</h2>


<hr class=" text-black-50">
<div>
    <h2>{{ $article->title }}</h2>
    <div class="mb-3">
        <span class="badge bg-dark">Category : {{ $article->category_id }}</span>
        <span class="badge bg-dark">User : {{ $article->user_id }}</span>
    </div>
    <p>{{ $article->description }}</p>
</div>

@endsection
