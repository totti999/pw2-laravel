@extends('layout.main')

@section('title', 'Halaman Fakultas')
@section('subtitle', 'Fakultas')

@section('content')
    @section('credit','Universitas Multi Data Palembang')


     <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Fakultas</h4>
                 
                  <div class="table-responsive">
                    
                    <table class="table table-striped">
                      <thead>
                       
                        <tr>
                            <th>Nama Fakultas</th>
                            <TH>Nama Dekan</TH>
                            <th>Nama Wakil Dekan</th>
                            <th>Prodi</th>
                            <th>Created At</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($dataFakultas as $item)
                        <tr>
                          <td class="py-1">{{$item->nama_fakultas}}</td>
                          <td>{{$item->nama_dekan}}</td>
                          <td>
                            {{-- <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 79%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> --}}
                            {{$item->nama_wakil_dekan}}
                          </td>
                          <td>
                               @foreach ($item->prodi as $prodi )
                                    {{$prodi->nama_prodi}}
                                @endforeach
                          </td>
                          <td>{{$item->created_at}}</td>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                   <a href="{{ route('fakultas.create')}} " class="btn btn-rounded btn-primary">Tambah Data</a>
                </div>
              </div>
            </div>
          </div>
@endsection
{{-- 

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama Fakultas</th>
                <TH>Nama Dekan</TH>
                <th>Nama Wakil Dekan</th>
                <th>Prodi</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataFakultas as $item)
            <tr>
                <td>{{$item->nama_fakultas}}</td>
                 <td>{{$item->nama_dekan}}</td>
                 <td>{{$item->nama_wakil_dekan}}</td>
                 <td>       
                            @foreach ($item->prodi as $prodi )
                            {{$prodi->nama_prodi}}
                            @endforeach
                 </td> 
                 <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
        </tbody>

    </table> --}}

