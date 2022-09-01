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
                                        <label for="inputtanggaldaftar" class="col-sm-3 col-form-label">Tanggal Daftar</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tgl_daftar" class="form-control" id="inputtanggaldaftar" placeholder="No BPJS">
                                        </div>
                                    </div>
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
                                        <label for="inputfaskes" class="col-sm-3 col-form-label">Faskes</label>
                                        <div class="col-sm-9">
                                            <select name="faskes" id="inputfaskes" class="form-control">
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
                                    @if($posts->isNotEmpty())
                                    <input type="hidden" name="no_pendaftaran" value="{{$datasearch}}">
                                    @endif
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
                                <input type="text" name="no_pendaftaran" value="{{$datasearch}}">
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
                                <form method="post" id="pendaftaran-form" action="{{route('pelayanan.store')}}">
                                    @csrf
                                    @method('post')
                                    <fieldset class="form-group">
                                        <input type="text" name="pendaftaran_id" class="form-control" value="{{$pid}}">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-3 fw-bold">Jenis Kunjungan</legend>
                                            <div class="col-sm-9 d-flex">
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
                                        <div class="row">
                                            <legend class="col-form-label col-sm-3 fw-bold">Perawatan</legend>
                                            <div class="col-sm-9 d-flex">
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
                                        <label for="basic-url" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">

                                                <input type="date" name="tgl_kunjungan" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                                <input type="time" name="wkt_kunjungan" class="form-control" id="appt" name="appt" min="09:00" max="18:00">

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
                                            <textarea name="keluhan" id="" class="form-control" cols="40" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Anamnesa</label>
                                        <div class="col-sm-9">
                                            <textarea name="anamnesa" id="" class="form-control" cols="40" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="autoSizingInputGroup">Riwayat Alergi</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-text">Makanan</div>
                                                <select name="alergi_makanan" class="form-control" id="">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                </select>
                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-text">Udara</div>
                                                <select name="alergi_udara" class="form-control" id="">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                </select>
                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-text">Obat-obatan</div>
                                                <select name="alergi_obat" class="form-control" id="">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Prognosa</label>
                                        <div class="col-sm-9">
                                            <select name="prognosa" id="" class="form-control">
                                                <option value="Example 1">Example 1</option>
                                                <option value="Example 2">Example 2</option>
                                            </select>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Terapi Obat</label>
                                        <div class="col-sm-9">
                                            <textarea name="terapi_obat" id="" class="form-control" cols="40" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Terapi Non Obat</label>
                                        <div class="col-sm-9">
                                            <textarea name="terapi_nonobat" id="" class="form-control" cols="40" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">BMHP</label>
                                        <div class="col-sm-9">
                                            <textarea name="bmhp" id="" class="form-control" cols="40" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Diagnosa</label>
                                        <div class="col-sm-9">
                                            <textarea name="diagnosa" id="" class="form-control" cols="40" rows="2"></textarea>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input"  type="checkbox" value="1">
                                                    <span class="form-check-sign">Peserta berpotensi menderita penyakit akibat kerja</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Diagnosa #2 <br> (Sekunder)</label>
                                        <div class="col-sm-9">
                                            <textarea name="diagnosa_dua" id="" class="form-control" cols="40" rows="2"></textarea>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Diagnosa #3 <br> (Sekunder)</label>
                                        <div class="col-sm-9">
                                            <textarea name="diagnosa_tiga" id="" class="form-control" cols="40" rows="2"></textarea>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kesadaran</label>
                                        <div class="col-sm-9">
                                            <select name="kesadaran" id="" class="form-control">
                                                <option value="Example 1">Example 1</option>
                                                <option value="Example 2">Example 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Suhu</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">
                                                <input type="text" name="suhu" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">&deg;C</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Pemeriksaan Fisik</label>
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
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Pemeriksaan Fisik</label>
                                        <div class="col-sm">
                                            <label for="inputEmail">Sistole</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_sistole" class="form-control" aria-label="Username" aria-describedby="basic-addon1-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">cm</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">Diastole</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_diastole" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputEmail">Respiratory Rate</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_respiratory" class="form-control" aria-label="Username" aria-describedby="basic-addon1-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">kg</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">Heart Rate</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_heartrate" class="form-control" aria-label="Username" aria-describedby="basic-addon1-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">kg/m2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">

                                            <legend class="col-form-label col-sm-3 fw-bold">Kasus KLL</legend>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" name="kasus_kll" data-toggle='collapse' data-target='#collapsediv1' type="checkbox" value="">
                                                    <span class="form-check-sign">Kecelakaan Lalu Lintas</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapsediv1">
                                            <div class="card card-body">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Kejadian</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="tanggal_kejadian" class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Lokasi Kejadian</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="lokasi_kejadian" id="" class="form-control" cols="40" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tenaga Medis</label>
                                        <div class="col-sm-9">
                                            <select name="tenaga_medis" id="" class="form-control">
                                                <option>Pilih Tenaga Medis</option>
                                                <option value="1">22</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Pelayanan Non Kapitasi</label>
                                        <div class="col-sm-9">
                                            <style>
                                                textarea {
                                                    font-size: 15px;
                                                    width: 100%;
                                                }
                                            </style>
                                            <textarea name="pelayanan_non_kapitasi" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Status Pulang</label>
                                        <div class="col-sm-9">
                                            <select name="status_pulang" id="" class="form-control">
                                                <option></option>
                                                <option value="1">Pulang</option>
                                            </select>
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