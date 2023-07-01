@extends('layouts.app')

@section('content')
<h2>Edit Article</h2>
<form action="{{ route('article.update',$article->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="my-3">
        <label for="" class="form-label">Article Title</label>
        <input type="text" name="title" value="{{ old('title',$article->title) }}" class="form-control @error('title')
            is-invalid
        @enderror">
        @error('title')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="my-3">
        <label for="" class="form-label">Category</label>
        <select name="category" class=" form-select @error('category')
            is-invalid
        @enderror" id="">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category',$article->category_id) == $category->id ? 'selected' :'' }}>{{ $category->title }}</option>
            @endforeach
        </select>
        @error('category')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="my-3">
        <label for="" class="form-label">Article Description</label>
        <textarea name="description" class="form-control @error('description')
            is-invalid
        @enderror">{{ old('description',$article->description) }}</textarea>
        @error('description')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary">Update Article</button>
</form>
@endsection
