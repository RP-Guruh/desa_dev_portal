<?php

namespace App\Http\Controllers;

use App\Models\ProdukUmkmDesa;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = ProdukUmkmDesa::orderBy('created_at', 'desc')->paginate(9);
        return view('produk.index', compact('produk'));
    }

    public function show($id)
    {
        $produk = ProdukUmkmDesa::findOrFail($id);
        $produkLainnya = ProdukUmkmDesa::where('id', '!=', $id)->latest()->take(4)->get();
        return view('produk.show', compact('produk', 'produkLainnya'));
    }
}
