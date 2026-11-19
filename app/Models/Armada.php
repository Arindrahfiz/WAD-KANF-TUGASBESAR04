<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $table = 'armada';

    protected $fillable = [
        'nomor_seri',
        'jenis',
        'merek_model',
        'kapasitas',
        'lokasi',
        'status',
    ];
}
