<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntreanCs extends Model
{
    use HasFactory;

    protected $table = 'antrean_cs';

    protected $fillable = [
        'tanggal',
        'no_antrean',
        'status',
    ];
}
