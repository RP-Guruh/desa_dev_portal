<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikPernikahanPenduduk extends Model
{
    protected $fillable = [
        'id',
        'status',
        'jumlah',
        'tahun',
        'created_at',
        'updated_at'
    ];
}
