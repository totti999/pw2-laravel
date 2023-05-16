@extends('layout.main')

@section('title', 'Halaman Mahasiswa')
@section('subtitle', 'Create New')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Mahasiswa</h4>
                  <p class="card-description">
                    Formulir 
                  </p>
                  <form class="forms-sample" action="{{ route('mahasiswa.store')}} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input type="file" class="form-control" name="foto" placeholder="foto">
                      @error('foto')
                         <span class="text-danger">{{$message}}</span>
                      @enderror 
                    </div>
                     <div class="form-group">
                      <label for="npm">NPM</label>
                      <input type="number" class="form-control" name="npm" placeholder="NPM">
                      @error('npm')
                           <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                     <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" placeholder="nama">
                      @error('nama')
                           <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir">
                        @error('tgl_lahir')
                             <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="kota_lahir">Pilih Kota Lahir</label>
                       {{-- <select name="kota_lahir" class="form-control js-example-basic-single">
                       @foreach ($regencies as $item2)
                              <option value="{{$item2['name']}}">{{$item2['name']}}</option>
                       @endforeach
                      </select> --}}
                       <input type="text" class="form-control" name="kota_lahir" placeholder="Kota Lahir">
                        @error('kota_lahir')
                           <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="prodi_id">Pilih Prodi</label>
                       <select name="prodi_id" class="form-control js-example-basic-single">
                       @foreach ($prodi as $item)
                              <option value="{{$item->id}}">{{$item->nama_prodi}}</option>
                       @endforeach
                      </select>
                        @error('nama_prodi')
                           <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    <button type="submit" class="btn  btn-rounded btn-success me-2">Simpan</button>
                    <a  href="{{route('mahasiswa.index')}}" class="btn btn-rounded btn-dark">batal</a>
                  </form>
                </div>
              </div>
            </div>
</div>


@endsection