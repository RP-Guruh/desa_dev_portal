<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukUmkmDesa extends Model
{
    
    protected $fillable = [
        'nama_produk',
        'slug',
        'deskripsi',
        'penjual',
        'nowa_hp',
        'is_active',
        'harga',
        'thumbnail'
    ];

    public function photos()
    {
        return $this->hasMany(ProdukUmkmDesaPhoto::class);
    }

}
