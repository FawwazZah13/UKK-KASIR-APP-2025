@extends('layout.template')

@section('content')
    <div class="p-5 bg-white rounded-lg shadow">
        <div class="flex justify-between mb-4">
            <a href="#" class="btn btn-secondary">Kembali</a>
            <a href="#" class="btn btn-primary">Unduh</a>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
            <!-- Kiri -->
            <div>
                <p>

                    <strong>+62 85894981178</strong><br>
                    MEMBER SEJAK :
                    tgl<br>
                    {{-- MEMBER POIN : {{ $pembelian->poin }}</p> --}}
                    MEMBER POIN : 100
                </p>

            </div>
            <!-- Kanan -->
            <div style="text-align: right;">
                <p style="margin: 0;">Invoice - #2</p>
                <p style="margin: 0;">tvl</p>
            </div>
        </div>

        <p>
        </p>


        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>Iphone 15</td>
                    <td>Rp. 20.000.000</td>
                    <td>2</td>
                    <td>Rp. 20.000.000</td>
                </tr>

            </tbody>
        </table>

        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
            <!-- Kiri -->
            <p>
                Poin digunakan :
                <strong>
                    200 dipakai
                </strong><br>


                Kasir :
                <strong style="margin-left: 10px;">
                    Petugas
                </strong><br>

                <strong>
                    Kembalian : Rp. 1.000.000
                </strong>
            </p>


            <!-- Kanan -->
            <div style="text-align: right;">
                <h3 style="margin: 0;">Total :
                    <strong>Rp. 20.000.000</strong>
                </h3>
            </div>
        </div>
    </div>
@endsection
