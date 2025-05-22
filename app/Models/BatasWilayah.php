<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatasWilayah extends Model
{
    protected $table = 'batas_wilayahs';
    protected $fillable = ['batas_utara', 'batas_timur', 'batas_selatan', 'batas_barat', 'luas_wilayah'];
}
