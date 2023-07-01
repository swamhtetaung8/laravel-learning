@extends('layouts.app')

@section('content')

<h2>Category List</h2>

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
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
            <tr class="align-middle">
                <td>
                    {{ $category->id }}
                </td>
                <td>
                    <p class="mb-0">{{ $category->title }}</p>
                </td>
                <td>
                    {{ $category->user_id }}
                </td>
                <td>
                   <div class=" btn-group">
                       <a href="{{ route('category.edit',$category->id) }}" class="bi bi-pencil btn btn-outline-dark btn-sm"></a>
                       <button form="categoryDeleteForm{{ $category->id }}" class="bi bi-trash3 btn btn-outline-dark btn-sm"></button>
                   </div>
                   <form id="categoryDeleteForm{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                   </form>
                </td>
                <td>
                    <p class="small mb-0"><i class="bi bi-calendar me-2"></i>{{ $category->created_at->format('d M Y') }}</p>
                    <p class="small mb-0"><i class="bi bi-clock me-2"></i>{{ $category->created_at->format('h:i a') }}</p>
                </td>
                <td>
                    <p class="small mb-0"><i class="bi bi-calendar me-2"></i>{{ $category->updated_at->format('d M Y') }}</p>
                    <p class="small mb-0"><i class="bi bi-clock me-2"></i>{{ $category->updated_at->format('h:i a') }}</p>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">
                    No categorys found
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
