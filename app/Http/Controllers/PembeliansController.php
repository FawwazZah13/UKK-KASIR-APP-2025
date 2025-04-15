<?php

namespace App\Http\Controllers;

use App\Models\Pembelians;
use App\Models\Produks;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PembeliansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelians = Pembelians::all();
        return view('pembelian.index',compact('pembelians'));
    }

    public function show(Pembelians $pembelians)
    {
        $produks = Produks::all();
        return view('pembelian.showProduk',compact('produks'));
    }

    public function cart(Request $request){
        // dd($request);
        $cart = session('cart')->get();
        


    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelians $pembelians)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelians $pembelians)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelians $pembelians)
    {
        //
    }
}
