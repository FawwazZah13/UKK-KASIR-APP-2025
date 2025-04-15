@extends('layout.template')

@section('content')

<!-- Form pencarian produk -->
<form method="GET" action="#" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="">
        <button class="btn btn-outline-secondary" type="submit">Cari</button>
    </div>
</form>

{{-- a --}}
    <a href="" class="btn btn-primary m-3">
        Create Produk</a>

    <div class="container border p-3 rounded shadow bg-white">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td class="text-secondary">
                                <img src="" alt=""
                                    style="width: 80px;">
                        </td>
                        <td class="text-secondary">Sabun</td>
                        <td class="text-secondary">Rp. 10.000</td>
                        <td class="text-secondary">1</td>
                        <td>
                            <a href="#" class="btn btn-primary">Update Stok</a>
                            <a href="#" class="btn btn-warning">Update</a>

                            <form action="#" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
        </table>
{{-- p
    <div class="container border p-3 rounded shadow bg-white">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td class="text-secondary">
                                <img src="" alt=""
                                    style="width: 80px;">
                        </td>
                        <td class="text-secondary">Sabun</td>
                        <td class="text-secondary">Rp. 10.000</td>
                        <td class="text-secondary">8</td>
                    </tr>
               
            </tbody>
        </table>


    </div> --}}
@endsection
