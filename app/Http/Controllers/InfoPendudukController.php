<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TentangDesa;
use App\Models\StatistikTotalPenduduk;
use App\Models\StatistikUsiaPenduduk;
use App\Models\StatistikPendidikanPenduduk;
use App\Models\StatistikPernikahanPenduduk;
use Illuminate\Support\Facades\DB;
use App\Models\StructureOrganization;
use App\Models\BeritaDesa;
use App\Enums\PendidikanEnum;
use App\Enums\AgamaEnum;
use App\Enums\PernikahanEnum;
use App\Models\StatistikAgamaPenduduk;

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

    public function dataByTahunPendidikan($tahun)
    {
        $data = StatistikPendidikanPenduduk::where('tahun', $tahun)->get();
        $tingkat_pendidikan = PendidikanEnum::cases();
    
        $pendidikan_map = [];
        foreach ($tingkat_pendidikan as $pendidikan) {
            $pendidikan_map[$pendidikan->name] = $pendidikan->value;
        }
    
        // Siapkan array dengan nilai default 0
        $jumlah_penduduk = array_fill_keys(array_values($pendidikan_map), 0);
    
        // Isi data sesuai dari database
        foreach ($data as $row) {
            if (isset($pendidikan_map[$row->tingkat_pendidikan])) {
                $label = $pendidikan_map[$row->tingkat_pendidikan];
                $jumlah_penduduk[$label] = $row->jumlah;
            }
        }
    
        $labels = array_keys($jumlah_penduduk);
        $dataPoints = [];
        foreach ($jumlah_penduduk as $label => $jumlah) {
            $dataPoints[] = ['label' => $label, 'y' => $jumlah];
        }
    
        return response()->json([
            'tahun' => $tahun,
            'dataPoints' => $dataPoints
        ]);
    }


    public function dataByTahunAgama($tahun)
    {
        $data = StatistikAgamaPenduduk::where('tahun', $tahun)->get();
        $agama_dianut = AgamaEnum::cases();
    
        $agama_map = [];
        foreach ($agama_dianut as $agama) {
            $agama_map[$agama->name] = $agama->value;
        }
    
        // Siapkan array dengan nilai default 0
        $jumlah_penduduk = array_fill_keys(array_values($agama_map), 0);
    
        // Isi data sesuai dari database
        foreach ($data as $row) {
            if (isset($agama_map[$row->agama])) {
                $label = $agama_map[$row->agama];
                $jumlah_penduduk[$label] = $row->jumlah;
            }
        }
    
        $labels = array_keys($jumlah_penduduk);
        $dataPoints = [];
        foreach ($jumlah_penduduk as $label => $jumlah) {
            $dataPoints[] = ['label' => $label, 'y' => $jumlah];
        }
    
        return response()->json([
            'tahun' => $tahun,
            'dataPoints' => $dataPoints
        ]);
    } 

    public function dataByTahunPerkawinan($tahun)
    {
        $data = StatistikPernikahanPenduduk::where('tahun', $tahun)->get();
        $status_perkawinan = PernikahanEnum::cases();
    
        $perkawinan_map = [];
        foreach ($status_perkawinan as $perkawinan) {
            $perkawinan_map[$perkawinan->name] = $perkawinan->value;
        }
    
        // Siapkan array dengan nilai default 0
        $jumlah_perkawinan = array_fill_keys(array_values($perkawinan_map), 0);
    
        // Isi data sesuai dari database
        foreach ($data as $row) {
            if (isset($perkawinan_map[$row->status])) {
                $label = $perkawinan_map[$row->status];
                $jumlah_perkawinan[$label] = $row->jumlah;
            }
        }
    
        $labels = array_keys($jumlah_perkawinan);
        $dataPoints = [];
        foreach ($jumlah_perkawinan as $label => $jumlah) {
            $dataPoints[] = ['label' => $label, 'y' => $jumlah];
        }
    
        return response()->json([
            'tahun' => $tahun,
            'dataPoints' => $dataPoints
        ]);
    } 

    public function dataByTahunPekrjaan($tahun)
    {
        // Implementasi logika untuk mendapatkan data berdasarkan tahun
        // ...
    }
}
