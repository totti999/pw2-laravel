@extends('layout.main')

@section('title', 'Halaman Fakultas')
@section('subtitle', 'Create New')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Fakultas</h4>
                  <p class="card-description">
                    Formulir 
                  </p>
                  <form class="forms-sample" action="{{ route('fakultas.store')}} " method="post">
                    @csrf
                    <div class="form-group">
                      <label for="nama_fakultas">Nama Fakultas</label>
                      <input type="text" class="form-control" name="nama_fakultas" placeholder="nama fakultas">
                      @error('nama_fakultas')
                         <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                     <div class="form-group">
                      <label for="nama_dekan">Nama Dekan</label>
                      <input type="text" class="form-control" name="nama_dekan" placeholder="nama dekan">
                      @error('nama_dekan')
                           <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                     <div class="form-group">
                      <label for="nama_wakildekan">Nama Wakil Dekan</label>
                      <input type="text" class="form-control" name="nama_wakil_dekan" placeholder="nama wakil dekan">
                      @error('nama_wakil_dekan')
                           <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <button type="submit" class="btn  btn-rounded btn-success me-2">Simpan</button>
                    <a  href="{{route('fakultas.index')}}" class="btn btn-rounded btn-dark">batal</a>
                  </form>
                </div>
              </div>
            </div>
</div>


@endsection