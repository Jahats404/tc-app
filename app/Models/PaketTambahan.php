<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketTambahan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_paket_tambahan';
    protected $table = 'paket_tambahan';
    protected $guarded = [];
    protected $casts = [
        'id_paket_tambahan' => 'string',
    ];
}