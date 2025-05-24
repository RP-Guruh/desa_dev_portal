<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikPekerjaanPenduduk extends Model
{
   
    protected $fillable = [
        'tahun',
        'pekerjaan',
        'jumlah',
    ];
}
