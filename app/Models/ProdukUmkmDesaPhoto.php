<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdukUmkmDesaPhoto extends Model
{
    protected $fillable = [
        'produk_umkm_desa_id',
        'photo'
    ];

    public function produkUmkmDesa(): BelongsTo
    {
        return $this->belongsTo(ProdukUmkmDesa::class);
    }
}
