<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Mahasiswa extends Model
{
    use HasFactory, HasUuids;

    public function prodi(){
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    protected $guarded =[
        'id',
        'created_at',
        'updated_at',
    ];

}
