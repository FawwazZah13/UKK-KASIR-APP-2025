@extends('layout.template')

@section('content')

<a href="#" class="btn btn-primary m-3">Create Users</a>

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
            <th scope="row">1</th>

        <td class="text-secondary">Admin</td>
        <td class="text-secondary">fawwazzahran@gmail.com</td>
        <td class="text-secondary">Admin</td>
        <td><a href="#" class="btn btn-warning">Update</a>
                <form action="#" method="POST" style="display: inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                </form>
        </td>
        </tr>
    </tbody>
</table>
</div>
@endsection