<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisPoi;

class Poi extends Model
{
    use HasFactory;

    public function jenispoi(){
        return $this->belongTo(JenisPoi::class);
    }
}
