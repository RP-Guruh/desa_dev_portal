<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SotkPosition extends Model
{
    protected $table = 'sotk_positions';

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

}
