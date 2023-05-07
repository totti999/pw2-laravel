<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;


class Fakultas extends Model
{
    use HasFactory;
    // use HasUuids;

    protected $keyType ='string';
    public $incrementing = false;
     
    public function prodi(){
        return $this->hasMany(Prodi::class);
    }

}
