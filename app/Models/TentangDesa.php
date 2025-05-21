<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangDesa extends Model
{
    protected $table = 'tentang_desa';
    protected $fillable = [
        'kata_sambutan',
        'visi',
        'sejarah',
    ];
    public function misi()
    {
        return $this->hasMany(\App\Models\MisiDesa::class, 'id_tentang_desa');
    }
    
    
}
