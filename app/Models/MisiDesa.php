<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MisiDesa extends Model
{
    protected $table = 'misi_desa';
    protected $fillable = [
        'misi',
    ];

    public function tentangDesa()
    {
        return $this->belongsTo(\App\Models\TentangDesa::class, 'id_tentang_desa');
    }
}
