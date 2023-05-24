@extends('layout.main')

@section('title', 'Halaman Mahasiswa')
@section('subtitle', 'Data Mahasiswa')

@section('content')
@section('credit', 'Universitas Multi Data Palembang')


<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <h4 class="card-title">Data</h4>
                 
                <div class="table-responsive">

                    <table class="table table-striped table-hover" id="posts-table">
                        <thead>

                            <tr>
                                <th scope="col"><input type="checkbox" class="check-all"></th>
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
                            @foreach ($mahasiswa as $item)
                                <tr>
                                    <td><input type="checkbox" class="check" value="{{ $item->id }}"></td>
                                    <td><img src="{{ asset('storage/images/' . $item->foto) }}" alt="Foto"
                                            class="img-fluid"></td>
                                    <td>{{ $item->npm }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ DateTime::createFromFormat('Y-m-d', $item->tanggal_lahir)->format('d F Y') }}
                                    </td>
                                    <td>{{ $item->kota_lahir }}</td>
                                    <td>{{ $item->Prodi->nama_prodi }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td> <a href="{{ route('mahasiswa.edit', $item->id)}}"><i class="mdi mdi-lead-pencil"></i></a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('mahasiswa.create') }} " class="btn btn-rounded btn-primary ">Tambah Data</a>
                    
                    @if (count($mahasiswa) != 0)
                    <button class="btn btn-danger btn-rounded ms-3" id="multi-delete" data-route="{{ route('mhs-multi-delete') }}">Delete All Selected</button>
                    @endif
                </div>
            </div>  
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://www.jqueryscript.net/demo/check-all-rows/dist/TableCheckAll.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

    $("#posts-table").TableCheckAll();

    $('#multi-delete').on('click', function() {
        var button = $(this);
        var selected = [];
        $('#posts-table .check:checked').each(function() {
        selected.push($(this).val());
        });

        Swal.fire({
        icon: 'warning',
            title: 'Are you sure you want to delete selected record(s)?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: button.data('route'),
            data: {
                'selected': selected
            },
            success: function (response, textStatus, xhr) {
                Swal.fire({
                icon: 'success',
                    title: response,
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                window.location='/mahasiswa'
                });
            }
            });
        }
        });
    });

    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var button = $(this);

        Swal.fire({
        icon: 'warning',
            title: 'Are you sure you want to delete this record?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: button.data('route'),
            data: {
                '_method': 'delete'
            },
            success: function (response, textStatus, xhr) {
                Swal.fire({
                icon: 'success',
                    title: response,
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                window.location='/mahasiswa'
                });
            }
            });
        }
        });
        
    })
    });
</script>
@endsection
