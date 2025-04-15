@extends('layout.template')

@section('content')

<a href="{{ route('users.create') }}" class="btn btn-primary m-3">Create Users</a>

<div class="container border p-3 rounded shadow bg-white">
<table class="table">
    <thead>
        <tr>
            <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($user as $item)
            <th scope="row">{{ $loop->iteration }}</th>
            <td class="text-secondary">{{ $item->name }}</td>
            <td class="text-secondary">{{ $item->email }}</td>
            <td class="text-secondary">{{ $item->role }}</td>
            <td><a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning">Update</a>
                <form action="{{ route('users.delete', $item->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
