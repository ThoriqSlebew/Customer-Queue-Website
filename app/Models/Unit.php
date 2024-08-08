<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'jumlah_teller',
        'jumlah_cs',
        'running_text',
        'video_display',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
