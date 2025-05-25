<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaDesa extends Model
{
  
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'tanggal_publikasi',
        'status',
        'thumbnail',
        'created_by',
    ];
}
