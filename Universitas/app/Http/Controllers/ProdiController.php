<?php

namespace App\Http\Controllers;


use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(){
        $prodi = Prodi::all();
      
        return view('prodi.index')->with('prodis', $prodi);
    }
}