<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TentangDesa;
use App\Models\StatistikTotalPenduduk;
use App\Models\StructureOrganization;
use App\Models\BeritaDesa;

class HomeController extends Controller
{
    public function index()
    {
        $tentangDesa = TentangDesa::first();
        $penduduk = StatistikTotalPenduduk::where('tahun', date('Y'))->first();
        $sotk = StructureOrganization::all();
        $berita = BeritaDesa::orderBy('created_at', 'desc')->take(8)->get();
        return view('home.index', compact('tentangDesa','penduduk','sotk','berita'));
    }
}
