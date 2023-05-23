<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use GuzzleHttp\Client;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::all();
        return view('mahasiswa.index')->with('mahasiswas',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $client = new Client();
        // $response = $client->request('GET', 'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/16.json');
        // $regencies = json_decode($response->getBody(), true);

        $prodi = Prodi::orderBy('nama_prodi', 'ASC')->get();
        return view('mahasiswa.create', compact('prodi'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validasi = $request->validate([
            'foto' =>'required|file|image|max:5000',
            'npm' =>'required|unique:mahasiswas,npm',
            'nama' =>'required',
            'tanggal_lahir' =>'required',
            'kota_lahir'=>'required',
            "prodi_id" =>'required'
        ]);

        $temp = $request->foto->getClientOriginalExtension();
        $nama_foto = $validasi['npm'] . '.' . $temp;
       $path = $request->foto->storeAs('public/images', $nama_foto);


        // dd($validasi);
        $mahasiswa = new Mahasiswa();
        $mahasiswa->foto =$nama_foto;
        $mahasiswa->npm = $validasi['npm'];
        $mahasiswa->nama = $validasi['nama'];
        $mahasiswa->tanggal_lahir = $validasi['tanggal_lahir'];
        $mahasiswa->kota_lahir = $validasi['kota_lahir'];
        $mahasiswa->prodi_id = $validasi['prodi_id'];
        $mahasiswa->save();



        return redirect()->route('mahasiswa.index')->with('success',"Data ".$validasi['nama']. " berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
         $prodi = Prodi::orderBy('nama_prodi', 'ASC')->get();
        return view('mahasiswa.edit')->with('mahasiswa', $mahasiswa)->with('prodi', $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
            $mahasiswa->delete();
            // return redirect()->back()->with('success', 'Data berhasil dihapus');

            return response("selected data deleted succesfully", 200);
    }

    public function multiDelete(Request $request){
                Mahasiswa::whereIn('id', $request->get('selected'))->delete();

                return response("selected data deleted succesfully", 200);
    }
}