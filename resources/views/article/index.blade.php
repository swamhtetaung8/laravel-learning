@extends('layouts.app')

@section('content')

<h2>Article List</h2>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<hr class=" text-black-50">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Actions</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($articles as $article)
            <tr class="align-middle">
                <td>
                    {{ $article->id }}
                </td>
                <td>
                    <p class="mb-0">{{ $article->title }}</p>
                    <p class="small text-black-50 mb-0">{{Str::limit( $article->description ,50)}}</p>
                </td>
                <td>
                    {{ $article->user_id }}
                </td>
                <td>
                   <div class=" btn-group">
                       <a href="{{ route('article.show',$article->id) }}" class="bi bi-info btn btn-outline-dark btn-sm"></a>
                       <a href="{{ route('article.edit',$article->id) }}" class="bi bi-pencil btn btn-outline-dark btn-sm"></a>
                       <button form="articleDeleteForm{{ $article->id }}" class="bi bi-trash3 btn btn-outline-dark btn-sm"></button>
                   </div>
                   <form id="articleDeleteForm{{ $article->id }}" action="{{ route('article.destroy',$article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                   </form>
                </td>
                <td>
                    <p class="small mb-0"><i class="bi bi-calendar me-2"></i>{{ $article->created_at->format('d M Y') }}</p>
                    <p class="small mb-0"><i class="bi bi-clock me-2"></i>{{ $article->created_at->format('h:i a') }}</p>
                </td>
                <td>
                    <p class="small mb-0"><i class="bi bi-calendar me-2"></i>{{ $article->updated_at->format('d M Y') }}</p>
                    <p class="small mb-0"><i class="bi bi-clock me-2"></i>{{ $article->updated_at->format('h:i a') }}</p>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">
                    No articles found
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
