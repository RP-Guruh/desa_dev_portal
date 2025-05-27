<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndikatorSdgsDesa extends Model
{
    
    protected $fillable = [
        'category_indikator_sdgs_desa_id',
        'nilai',
        'tahun',
    ];

    public function categorySdgs()
    {
        return $this->belongsTo(CategoryIndikatorSdgsDesa::class, 'category_indikator_sdgs_desa_id');
    }
}
