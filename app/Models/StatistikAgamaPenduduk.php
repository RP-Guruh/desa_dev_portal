<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikAgamaPenduduk extends Model
{
    protected $fillable = [
        'id',
        'agama',
        'jumlah',
        'tahun',
        'created_at',
        'updated_at'
    ];
}
