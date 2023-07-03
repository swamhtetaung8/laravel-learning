@extends('layouts.app')

@section('content')

<h2>User List</h2>

<hr class=" text-black-50">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Total Article</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr class="align-middle">
                <td>
                    {{ $user->id }}
                </td>
                <td>
                    <p class="mb-0 small">{{ $user->name }}</p>
                    <p class="mb-0 small text-black-50">{{ $user->email }}</p>
                </td>
                <td>
                    {{ $user->role }}
                </td>
                <td>
                    <p class="mb-0">{{ $user->articles->count() }}</p>
                </td>
                <td>
                    <p class="small mb-0"><i class="bi bi-calendar me-2"></i>{{ $user->created_at->format('d M Y') }}</p>
                    <p class="small mb-0"><i class="bi bi-clock me-2"></i>{{ $user->created_at->format('h:i a') }}</p>
                </td>
                <td>
                    <p class="small mb-0"><i class="bi bi-calendar me-2"></i>{{ $user->updated_at->format('d M Y') }}</p>
                    <p class="small mb-0"><i class="bi bi-clock me-2"></i>{{ $user->updated_at->format('h:i a') }}</p>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">
                    No Users found
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
