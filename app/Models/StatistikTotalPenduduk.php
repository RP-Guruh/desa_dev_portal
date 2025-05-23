<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikTotalPenduduk extends Model
{
    protected $table = 'statistik_total_penduduks';

    protected $fillable = [
        'jumlah_lakilaki',
        'jumlah_perempuan',
        'jumlah_kk',
        'jumlah_penduduk',
        'tahun'
    ];

}
