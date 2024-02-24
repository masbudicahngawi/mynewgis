<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;

class JenisPoi extends Model
{
    use HasFactory;

    public function pois(){
        return $this->hasMany(Poi::class);
    }
}
