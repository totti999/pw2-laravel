<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Mahasiswa extends Model
{
    use HasFactory, HasUuids;

    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

}
