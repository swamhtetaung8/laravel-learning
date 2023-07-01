@extends('layouts.app')

@section('content')
<h2>Create Category</h2>
<form action="{{ route('category.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="my-3">
        <label for="" class="form-label">Category Title</label>
        <input type="text" name="title" value="{{ old('title',$category->title) }}" class="form-control @error('title')
            is-invalid
        @enderror">
        @error('title')
            <div class=" invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button class="btn btn-primary">Update category</button>
</form>
@endsection
