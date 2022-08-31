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
            <div class="col-md-7">
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
                                <form method="post" id="pendaftaran-form" action="{{route('pendaftaran.store')}}">
                                    @csrf
                                    @method('post')
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Daftar</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tgl_daftar" class="form-control" id="inputEmail3" placeholder="No BPJS">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Poli</label>
                                        <div class="col-sm-9">
                                            <select name="poli" id="" class="form-control">
                                                <option value="Poli Umum">Poli Umum</option>
                                                <option value="Poli Khusus">Poli Khusus</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Faskes</label>
                                        <div class="col-sm-9">
                                            <select name="faskes" id="" class="form-control">
                                                <option value="driconhorizon">dr.Icon Horizon (009OU074)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">

                                            <legend class="col-form-label col-sm-3 fw-bold">Sumber Data</legend>
                                            <div class="col-sm-9 d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadios1" value="No Antrian">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        No Antrian
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadios2" value="No Kartu">
                                                    <label class="form-check-label" for="gridRadios2">
                                                        No Kartu
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">No Pendaftaran</label>
                                    <div class="col-sm-9">
                                        <form action="{{ route('pendaftaran.create') }}" method="GET">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">A</span>
                                                <input type="text" name="search" class="form-control" value="" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if($posts->isNotEmpty())
                                <input type="text" value="{{$datasearch}}">
                                @foreach ($posts as $post)
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">No.Kartu BPJS</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->bpjs}}</p>
                                    </div>
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->nama}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->tgl}}</p>
                                    </div>
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Kelamin</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->kelamin}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">No Handphone</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->nohp}}</p>
                                    </div>
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">No Rekam Medis</label>
                                    <div class="col-sm-3">
                                        <p class="mt-2">{{$post->rekam_medis}}</p>
                                    </div>
                                </div>
                                @endforeach
                                @else

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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm">
                                <h2>
                                    Pelayanan
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" id="pendaftaran-form" action="{{route('pendaftaran.store')}}">
                                    @csrf
                                    @method('post')
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-3 fw-bold">Jenis Kunjungan</legend>
                                            <div class="col-sm-9 d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadiossakit" value="No Antrian">
                                                    <label class="form-check-label" for="gridRadiossakit">
                                                        Kunjungan Sakit
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadiossehat" value="No Kartu">
                                                    <label class="form-check-label" for="gridRadiossehat">
                                                        Kunjungan Sehat
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-3 fw-bold">Perawatan</legend>
                                            <div class="col-sm-9 d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadiosjalan" value="No Antrian">
                                                    <label class="form-check-label" for="gridRadiosjalan">
                                                        Rawat Jalan
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadiosinap" value="No Kartu">
                                                    <label class="form-check-label" for="gridRadiosinap">
                                                        Rawat Inap
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadiospreventif" value="No Kartu">
                                                    <label class="form-check-label" for="gridRadiospreventif">
                                                        Promotif Preventif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label for="basic-url" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">

                                                <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                                <input type="time" class="form-control" id="appt" name="appt" min="09:00" max="18:00">

                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        textarea {
                                            font-size: 15px;
                                            width: 100%;
                                        }
                                    </style>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Keluhan</label>
                                        <div class="col-sm-9">
                                            <textarea name="" id="" cols="40" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Anamnesa</label>
                                        <div class="col-sm-9">
                                            <textarea name="" id="" cols="40" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Anamnesa</label>
                                        <div class="col-sm-9">
                                            <textarea name="" id="" cols="40" rows="2"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Poli</label>
                                        <div class="col-sm-9">
                                            <select name="poli" id="" class="form-control">
                                                <option value="Poli Umum">Poli Umum</option>
                                                <option value="Poli Khusus">Poli Khusus</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Faskes</label>
                                        <div class="col-sm-9">
                                            <select name="faskes" id="" class="form-control">
                                                <option value="driconhorizon">dr.Icon Horizon (009OU074)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">

                                            <legend class="col-form-label col-sm-3 fw-bold">Sumber Data</legend>
                                            <div class="col-sm-9 d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadios1" value="No Antrian">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        No Antrian
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadios2" value="No Kartu">
                                                    <label class="form-check-label" for="gridRadios2">
                                                        No Kartu
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>

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
            <div class="col-md-5">
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
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
@endsection