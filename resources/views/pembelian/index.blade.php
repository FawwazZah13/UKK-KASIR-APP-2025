@extends('layout.template')
@section('content')


<a href="{{ route('pembelian.show') }}" class="btn btn-primary m-3">
    Tambah Penjulaan
</a>


<a href="#" class="btn btn-success m-3">
    Export Excel
</a>

<div class="container border p-3 rounded shadow bg-white">
    <table id="myTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Penjualan</th>
                <th>Total Harga</th>
                <th>Dibuat Oleh</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th scope="row">1</th>
                <td>Fawwaz</td>
                <td>13 Mei 2007</td>
                <td>Rp. 10.000</td>
                <td>Petugas</td>
                <td>
                    <div class="d-flex justify-content-around">
                        <!-- Tombol lihat -->
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#lihat-">
                            Lihat
                        </button>

                        <!-- Tombol unduh -->
                        <a href="#" class="btn btn-info">
                            Unduh Bukti
                        </a>
                    </div>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="lihat-" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Detail Penjualan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Member Status:</strong> Non Member</p>
                            <p><strong>No HP:</strong> 085894981176</p>
                            <p><strong>Poin Member:</strong> 100 poin</p>
                            <p><strong>Bergabung Sejak:</strong>

                            14 Mein

                            </p>

                            <hr>

                            <h6>Daftar Produk:</h6>
                            <ul>

                                    <li>Nama Produk : Iphone 15</li>
                                    <li>Qty : 2</li>
                                    <li>Harga : Rp. 20.000</li>
                                    <li>Sub Total : Rp. 20.000</li>

                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

        </tbody>
    </table>
</div>

<!-- Pastikan Bootstrap JS dimuat -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
