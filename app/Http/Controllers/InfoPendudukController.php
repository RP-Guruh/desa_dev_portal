<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TentangDesa;
use App\Models\StatistikTotalPenduduk;
use App\Models\StatistikUsiaPenduduk;
use Illuminate\Support\Facades\DB;
use App\Models\StructureOrganization;
use App\Models\BeritaDesa;

class InfoPendudukController extends Controller
{
    public function index()
    {
        $currentYear = now()->year;
        $tahun = [];
    
        for ($i = 0; $i < 5; $i++) {
            $tahun[] = $currentYear - $i;
        }
    
        return view('infografis.penduduk.index', compact('tahun'));
    }

    public function dataByTahunJenisKelamin($tahun)
    {
        $data = StatistikTotalPenduduk::where('tahun', $tahun)->first();
        return response()->json([
            'laki' => $data->jumlah_lakilaki,
            'perempuan' => $data->jumlah_perempuan,
            'tahun' => $data->tahun,
        ]);
    }

    public function dataByTahunUsia($tahun)
    {
        $data = StatistikUsiaPenduduk::select('usia_min', 'usia_max', 'jenis_kelamin', DB::raw('SUM(jumlah) as total'))
        ->where('tahun', $tahun)
        ->groupBy('usia_min', 'usia_max', 'jenis_kelamin')
        ->orderBy('usia_min')
        ->get();

        $labels = [];
        $lakiData = [];
        $perempuanData = [];

        // Kumpulkan label rentang usia
        foreach ($data as $row) {
            $label = "{$row->usia_min}-{$row->usia_max}";
            if (!in_array($label, $labels)) {
                $labels[] = $label;
            }
        }

        // Inisialisasi data dengan nol
        foreach ($labels as $label) {
            $lakiData[$label] = 0;
            $perempuanData[$label] = 0;
        }

        // Isi data laki-laki dan perempuan
        foreach ($data as $row) {
            $label = "{$row->usia_min}-{$row->usia_max}";
            if ($row->jenis_kelamin === 'L') {
                $lakiData[$label] = (int) $row->total;
            } else if ($row->jenis_kelamin === 'P') {
                $perempuanData[$label] = (int) $row->total;
            }
        }

        // Siapkan array dataPoints untuk CanvasJS
        $lakiDataPoints = [];
        $perempuanDataPoints = [];

        foreach ($labels as $label) {
            $lakiDataPoints[] = ['label' => $label, 'y' => $lakiData[$label]];
            $perempuanDataPoints[] = ['label' => $label, 'y' => $perempuanData[$label]];
        }

        return response()->json([
            'lakiDataPoints' => $lakiDataPoints,
            'perempuanDataPoints' => $perempuanDataPoints,
            'tahun' => $tahun,
        ]);
    }
}
