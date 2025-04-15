<?php

namespace App\Http\Controllers;

use App\Models\Produks;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProduksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produks::all();
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);

        $produks = new Produks();
        $produks->nama_produk = $request->nama_produk;
        $produks->harga = $request->harga;
        $produks->stok = $request->stok;

        if ($request->hasFile('gambar')) {
            $fillname = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('/img'), $fillname);
            $produks->gambar = $fillname;
        }

        $produks->gambar = $fillname;

        $produks->save();
        return redirect()->route('produk.index')->with('Success', 'Data berhasil di buat');
    }

    public function updateStok($id)
    {
        $produks = Produks::find($id);
        return view('produk.updateStok', compact('produks'));
    }

    public function updateStokProduk(Request $request, $id)
    {
        $produks = Produks::find($id);
        $produks->stok = $request->input('stok');
        $produks->save();
        return redirect()->route('produk.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produks $produks, $id)
    {
        $produks = Produks::find($id);
        return view('produk.edit', compact('produks'));
    }
    function update(Request $request, Produks $produks, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            // 'gambar' => 'required',
        ]);

        $produks = Produks::findOrFail($id);

        $produks->nama_produk = $request->input('nama_produk');
        $produks->harga = $request->input('harga');
        $produks->stok = $request->input('stok');

        // if ($request->filled('gambar')) {
            if ($request->hasFile('gambar')) {
                $fillname = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('/img'), $fillname);
                $produks->gambar = $fillname;
            }
        // }

        $produks->save();
        return redirect()->route('produk.index')->with('Success', 'Data berhasil di buat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produks $produks, $id)
    {
        $produks = Produks::findOrFail($id);
        $produks->delete();
        return redirect()->route('produk.index');
    }
}
