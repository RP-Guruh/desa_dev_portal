<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StructureOrganization extends Model
{
    protected $table = 'structure_organizations';

    protected $fillable = [
        'fullname',
        'id_posisi_sotk',
        'phone_number',
        'email',
        'photo'
    ];


    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    public function sotkPosition()
    {
        return $this->belongsTo(SotkPosition::class, 'id_posisi_sotk');
    }
}
