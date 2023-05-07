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
                  <form class="forms-sample" action="{{ route('mahasiswa.store')}} " method="post">
                    @csrf
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input type="file" class="form-control" name="foto" placeholder="foto">
                      @error('foto')
                         <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                     <div class="form-group">
                      <label for="npm">Npm</label>
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
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="nama">
                        @error('nama')
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