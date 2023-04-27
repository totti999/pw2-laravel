<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;


class Fakultas extends Model
{
    use HasFactory, HasUuids;
     
    public function prodi(){
        return $this->hasMany(Prodi::class);
    }

}
