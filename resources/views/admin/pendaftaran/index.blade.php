@extends('layouts.app')
@section('content')
@include('sweetalert::alert')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column mb-2 flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Welcome !</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <a href="{{route('pendaftaran.create')}}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table id="datatable" class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">aksi</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Poli</th>
                                        <th scope="col">Fasilitas Kesehatan</th>
                                        <th scope="col">Sumber Data</th>
                                        <th scope="col">No Pendaftaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <div class="d-flex">
                                             <a href="{{route('pendaftaran.edit',$row)}}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                             <a href="{{route('pendaftaran.hapus',$row)}}" class="btn btn-sm btn-primary show_confirm">Hapus</a>
                                            </div>
                                        </td>
                                        <td>{{($row->pasien_id != null) ? $row->pasien->nama :''}}</td>
                                        <td>{{$row->poli}}</td>
                                        <td>{{$row->faskes}}</td>
                                        <td>{{$row->sumber_data}}</td>
                                        <td>{{$row->no_pendaftaran}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
        $(document).ready(function() {
        $('.show_confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    });
</script>
@endsection