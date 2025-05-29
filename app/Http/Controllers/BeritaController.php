<?php

namespace App\Http\Controllers;

use App\Models\BeritaDesa;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = BeritaDesa::orderBy('created_at', 'desc')->paginate(9);
        return view('berita.index', compact('berita'));
    }

    public function show($id)
    {
        $berita = BeritaDesa::findOrFail($id);
        $beritaLain = BeritaDesa::where('id', '!=', $id)
                        ->latest()
                        ->take(5)
                        ->get();
    
        return view('berita.show', compact('berita', 'beritaLain'));
    }
}
