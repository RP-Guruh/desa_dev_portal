<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikUsiaPenduduk extends Model
{
    protected $table = 'statistik_usia_penduduks';

    protected $fillable = [
        'usia_min',
        'usia_max',
        'jenis_kelamin',
        'jumlah',
        'tahun',
    ];
}
