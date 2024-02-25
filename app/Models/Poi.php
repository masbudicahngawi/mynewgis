<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisPoi;

class Poi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'objek', 'latitude',
    'longitude', 'koordinat_polygon', 'jml_titik','jenis_id', ];

    public function jenispoi(){
        return $this->belongTo(JenisPoi::class);
    }
}