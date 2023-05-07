@extends('layout.main')

@section('title', 'Halaman Mahasiswa')
@section('subtitle', 'Data Mahasiswa')

@section('content')
    @section('credit','Universitas Multi Data Palembang')


     <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  @if (Session::get('success'))
                      <div class="alert alert-success">
                          {{Session::get('success')}}
                      </div>

                  @endif
                  <h4 class="card-title">Data</h4>

                  <div class="table-responsive">

                    <table class="table table-striped">
                      <thead>

                        <tr>
                            <th>Foto</th>
                            <TH>NPM</TH>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Kota Lahir</th>
                            <th>Prodi</th>
                            <th>Created At</th>
                        </tr>
                      </thead>
                      <tbody>
                            <tr>

                            </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="d-flex justify-content-end mt-3">
                      <a href="{{ route('mahasiswa.create')}} " class="btn btn-rounded btn-primary ">Tambah Data</a>
                  </div>

                </div>
              </div>
            </div>
          </div>
@endsection
