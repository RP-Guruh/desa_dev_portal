<?php

namespace App\Http\Controllers;

use App\Models\TentangDesa;
use App\Models\MisiDesa;

class ProfilController extends Controller
{
    public function index()
    {
        $tentangDesa = TentangDesa::first();
        $misiDesa = MisiDesa::all();
        return view('profil.index', compact('tentangDesa', 'misiDesa'));
    }
}
