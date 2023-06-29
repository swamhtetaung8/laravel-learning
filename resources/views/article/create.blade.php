@extends('layouts.app')

@section('content')
<h2>Create Article</h2>
<form action="{{ route('article.store') }}" method="POST">
    @csrf
    <div class="my-3">
        <label for="" class="form-label">Article Title</label>
        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title')
            is-invalid
        @enderror">
        @error('title')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="my-3">
        <label for="" class="form-label">Article Description</label>
        <textarea name="description" class="form-control @error('description')
            is-invalid
        @enderror">{{ old('description') }}</textarea>
        @error('description')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary">Create Article</button>
</form>
@endsection
