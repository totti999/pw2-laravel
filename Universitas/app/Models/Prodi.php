<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Prodi extends Model
{
    use HasFactory;
    use HasUuids;
    // protected $keyType ='string';
    // public $incrementing = false;
    protected $table='prodi';

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

//     protected $fillable = [
//         'id',
//         'nama_prodi',
//         'fakultas_id',
//         'created_at',
//         'updated_at'
//     ];

        protected $guarded = [
            'id',
            'created_at',
            'updated_at'
        ];

 }