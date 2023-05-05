@extends('layout.main')

@section('title', 'Halaman Prodi')
@section('subtitle', 'Create New')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Prodi</h4>
                  <p class="card-description">
                    Formulir
                  </p>
                  <form class="forms-sample" action="{{ route('prodi.store')}} " method="post">
                    @csrf
                    <div class="form-group">
                      <label for="nama_prodi">Nama Prodi</label>
                      <input type="text" class="form-control" name="nama_prodi" value="{{old('nama_prodi')}}" placeholder="nama prodi">
                      @error('nama_prodi')
                         <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="fakultas_id">Pilih Fakultas Prodi</label>
                     <select name="fakultas_id" class="form-control js-example-basic-single">
                     @foreach ($fakultas as $item)
                            <option value="{{$item->id}}">{{$item->nama_fakultas}}</option>
                     @endforeach
                    </select>
                      @error('nama_fakultas')
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
