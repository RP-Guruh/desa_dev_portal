<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikPendidikanPenduduk extends Model
{
    protected $table = 'statistik_pendidikan_penduduks';

    protected $fillable = [
        'tingkat_pendidikan',
        'jumlah',
        'tahun',
    ];

}
