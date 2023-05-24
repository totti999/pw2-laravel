<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;


class Fakultas extends Model
{
    use HasFactory;
    use HasUuids;

    // protected $keyType ='string';
    // public $incrementing = false;
     
    public function prodi(){
        return $this->hasMany(Prodi::class);
    }

    // protected $fillable = [
    //     'id',
    //     'nama_fakultas',
    //     'nama_dekan',
    //     'nama_wakil_dekan',
    //     'created_at',
    //     'updated_at'
    // ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

}
