<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntreanTeller extends Model
{
    use HasFactory;

    protected $table = 'antrean_tellers';

    protected $fillable = [
        'tanggal',
        'no_antrean',
        'status',
    ];
}
