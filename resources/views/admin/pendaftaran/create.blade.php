@extends('layouts.app')
@section('content')
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
        <div class="row">

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm">
                                <a href="{{route('pasien.create')}}" class="btn btn-primary">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="inputtanggaldaftar" class="col-sm-3 col-form-label">Tanggal Daftar</label>
                                    <div class="col-sm-9">
                                        <input type="date" value="{{$times}}" name="tgl_daftar" class="form-control" id="inputtanggaldaftar" placeholder="No BPJS">
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-3 fw-bold">Sumber Data</legend>
                                        <div class="col-sm-9 d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" checked type="radio" name="sumber_data" id="gridRadios1" value="No Antrian">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Baru
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">No Pencarian</label>
                                    <div class="col-sm-9">
                                        <form action="{{ route('pendaftaran.create') }}" method="GET">
                                            @csrf
                                            <div class="input-group mb-3">

                                               
                                                <input type="text" name="search" class="form-control" value="" placeholder="" aria-label="No Pendaftaran" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <style>
                                    .no-border {
                                        border: 0;
                                        box-shadow: none;
                                        /* You may want to include this as bootstrap applies these styles too */
                                    }
                                </style>
                                @if($posts->isNotEmpty())
                                <input type="text" name="no_pendaftaran" value="{{$datasearch}}">
                                @foreach ($posts as $post)
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">No Kartu BPJS</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->bpjs}}</p>
                                    </div>
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->nama}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Status Peserta</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->tgl}}</p>
                                    </div>
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->kelamin}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Kelamin</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->kelamin}}</p>
                                    </div>
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">PPK UMUM</label>
                                    <div class="col-sm-3">
                                        <i class="fa fa-check-circle mt-2 text-success" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">No Handphone</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->nohp}}</p>
                                    </div>
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">No Rekam <br> Medis</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->rekam_medis}}</p>
                                    </div>
                                </div>
                                @endforeach
                                @else

                                @endif
                                
                                @if($posts->isNotEmpty())
                                <input type="hidden" name="no_pendaftaran" value="{{$datasearch}}">
                                @endif



                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary" onclick="my_button_click_handler()">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" id="pendaftaran-form" action="{{route('pelayanan.store')}}">
                                    @csrf
                                    @method('post')
                                    <fieldset class="form-group">
                                        <input type="hidden" name="pendaftaran_id" class="form-control" value="{{$pid}}">
                                        <div class="row d-flex justify-content-between">
                                            <legend class="col-form-label col-sm-4 fw-bold">Jenis Kunjungan</legend>
                                            <div class="col-sm-8 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kunjungan" id="gridRadiossakit" value="Kunjungan Sakit">
                                                    <label class="form-check-label" for="gridRadiossakit">
                                                        Kunjungan Sakit
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kunjungan" id="gridRadiossehat" value="Kunjungan Sehat">
                                                    <label class="form-check-label" for="gridRadiossehat">
                                                        Kunjungan Sehat
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="row d-flex justify-content-between">
                                            <legend class="col-form-label col-sm-4 fw-bold">Perawatan</legend>
                                            <div class="col-sm-8 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="perawatan" id="gridRadiosjalan" value="Rawat Jalan">
                                                    <label class="form-check-label" for="gridRadiosjalan">
                                                        Rawat Jalan
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="perawatan" id="gridRadiosinap" value="Rawat Inap">
                                                    <label class="form-check-label" for="gridRadiosinap">
                                                        Rawat Inap
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="perawatan" id="gridRadiospreventif" value="Promotif Preventif">
                                                    <label class="form-check-label" for="gridRadiospreventif">
                                                        Promotif Preventif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label for="inputpoli" class="col-sm-3 col-form-label">Poli</label>
                                        <div class="col-sm-9">
                                            <select name="poli" id="inputpoli" class="form-control">
                                                <option value="Poli Umum">Poli Umum</option>
                                                <option value="Poli Khusus">Poli Khusus</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Keluhan</label>
                                        <div class="col-sm-9">
                                            <textarea name="keluhan" id="" class="form-control" cols="40" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <h2>Pemeriksaan Fisik</h2>
                                    <div class="form-group row">
                                        <div class="col-sm">
                                            <label for="inputEmail">Tinggi Badan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="pemeriksaan_tinggi" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">cm</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">Lingkar Perut</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="pemeriksaan_lingkar" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputEmail">Berat Badan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="pemeriksaan_berat" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">kg</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">IMT</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="pemeriksaan_imt" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">kg/m2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm">
                                            <label for="inputEmail">Sistole</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_sistole" class="form-control" aria-label="Username" aria-describedby="basic-addon1-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">mmHg</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">Diastole</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_diastole" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">mmHg</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputEmail">Respiratory Rate</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_respiratory" class="form-control" aria-label="Username" aria-describedby="basic-addon1-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">/ minute</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">Heart Rate</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_heartrate" class="form-control" aria-label="Username" aria-describedby="basic-addon1-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">bpm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm">
                                <a href="{{route('pasien.create')}}" class="btn btn-primary">Riwayat Data Pelayanan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">No Kartu</th>
                                            <th scope="col">Nama Peserta</th>
                                            <th scope="col">Kelamin</th>
                                            <th scope="col">Usia</th>
                                            <th scope="col">Poli Kegiatan</th>
                                            <th scope="col">Sumber</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pelayanan as $row)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{($row->nokartu)}}</td>
                                            <td>{{($row->pasien->nama)}}</td>
                                            <td>{{($row->kelamin)}}</td>
                                            <td>{{($row->usia)}}</td>
                                            <td>{{($row->poli)}}</td>
                                            <td>{{($row->sumber_data)}}</td>
                                            <td>{{($row->status)}}</td>
                                            <td>{{($row->status)}}</td>
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
        <script>
            function my_button_click_handler() {
                alert('Button Clcked');
                var form = document.getElementById("pendaftaran-form");
                form.submit();
            }
        </script>
    </div>
</div>
@endsection