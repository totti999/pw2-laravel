<?php

namespace App\Http\Controllers;


use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(){
        $prodi = Prodi::all();

        return view('prodi.index')->with('prodis', $prodi);
    }

       public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        // dd($request); for all
        // dd($request->nama_fakultas); for specify

        $validasi = $request->validate([

             'nama_prodi'=> 'required|unique:prodi,nama_prodi',
            'fakultas_id' => 'required',


        ]);

        // dd($validasi);
        $prodi = new Prodi();
        $prodi->nama_prodi = $validasi['nama_prodi'];
        $prodi->fakultas_id = $validasi['fakultas_id'];
        $prodi->save();
            return redirect()->route('prodi.index')->with('success',"Data".$validasi['nama_prodi']. "berhasil disimpan");


    }
}
