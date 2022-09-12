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
                <div class="card-head-row">
                    <div class="card-title">User Statistics</div>
                    <div class="card-tools">
                        <a href="{{route('pasien.create')}}" class="btn btn-info btn-border btn-round btn-sm mr-2">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Tambah Data
                        </a>
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                            <span class="btn-label">
                                <i class="fa fa-print"></i>
                            </span>
                            Print
                        </a>
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
                                        <th scope="col">Aksi</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No BPJS</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">No Handphone</th>
                                        <th scope="col">Rekam Medis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('pasien.edit',$row)}}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                                <a href="{{route('pasien.hapus',$row)}}" class="btn btn-sm btn-primary show_confirm">Hapus</a>
                                            </div>
                                        </td>
                                        <td>{{$row->nama}}</td>
                                        <td>{{$row->bpjs}}</td>
                                        <td>{{$row->kelamin}}</td>
                                        <td>{{$row->tgl}}</td>
                                        <td>{{$row->nohp}}</td>
                                        <td>{{$row->rekam_medis}}</td>
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