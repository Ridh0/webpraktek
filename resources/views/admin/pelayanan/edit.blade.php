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
        <div class="row">
            <div class="col-md-12">
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
                                <form method="post" id="pendaftaran-form" action="{{route('pelayanan.update')}}">
                                    @csrf
                                    @method('put')
                                    <fieldset class="form-group">
                                        <input type="text" name="id" class="form-control" value="{{$pelayanan->id}}">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-3 fw-bold">Jenis Kunjungan</legend>
                                            <div class="col-sm-9 d-flex">
                                                <div class="form-check">
                                                    <input {{($pelayanan->jenis_kunjungan == 'Kunjungan Sakit') ? 'checked' : ''}} class="form-check-input" type="radio" name="jenis_kunjungan" id="gridRadiossakit" value="Kunjungan Sakit">
                                                    <label class="form-check-label" for="gridRadiossakit">
                                                        Kunjungan Sakit
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input {{($pelayanan->jenis_kunjungan == 'Kunjungan Sehat') ? 'checked' : ''}} class="form-check-input" type="radio" name="jenis_kunjungan" id="gridRadiossehat" value="Kunjungan Sehat">
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
                                                    <input {{($pelayanan->perawatan == 'Rawat Jalan') ? 'checked' : ''}} class="form-check-input" type="radio" name="perawatan" id="gridRadiosjalan" value="Rawat Jalan">
                                                    <label class="form-check-label" for="gridRadiosjalan">
                                                        Rawat Jalan
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input {{($pelayanan->perawatan == 'Rawat Inap') ? 'checked' : ''}} class="form-check-input" type="radio" name="perawatan" id="gridRadiosinap" value="Rawat Inap">
                                                    <label class="form-check-label" for="gridRadiosinap">
                                                        Rawat Inap
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input {{($pelayanan->perawatan == 'Promotif Preventif') ? 'checked' : ''}} class="form-check-input" type="radio" name="perawatan" id="gridRadiospreventif" value="Promotif Preventif">
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

                                                <input type="date" name="tgl_kunjungan" value="{{$pelayanan->tanggal_kunjungan}}" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                                <input type="time" name="wkt_kunjungan" value="{{$pelayanan->waktu_kunjungan}}" class="form-control" id="appt" name="appt" min="09:00" max="18:00">

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
                                            <textarea name="keluhan" id="" class="form-control" cols="40" rows="2">{{$pelayanan->keluhan}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Anamnesa</label>
                                        <div class="col-sm-9">
                                            <textarea name="anamnesa" id="" class="form-control" cols="40" rows="2">{{$pelayanan->anamnesa}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="autoSizingInputGroup">Riwayat Alergi</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-text">Makanan</div>
                                                <select name="alergi_makanan" class="form-control" id="">
                                                    <option value="1" {{($pelayanan->alergi_makanan == '1') ? 'Selected': ''}}>1</option>
                                                    <option value="2" {{($pelayanan->alergi_makanan == '2') ? 'Selected': ''}}>2</option>
                                                    <option value="3" {{($pelayanan->alergi_makanan == '3') ? 'Selected': ''}}>3</option>
                                                </select>
                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-text">Udara</div>
                                                <select name="alergi_udara" class="form-control" id="">
                                                    <option value="1" {{($pelayanan->alergi_udara == '1') ? 'Selected': ''}}>1</option>
                                                    <option value="2" {{($pelayanan->alergi_udara == '2') ? 'Selected': ''}}>2</option>
                                                    <option value="3" {{($pelayanan->alergi_udara == '3') ? 'Selected': ''}}>3</option>

                                                </select>
                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-text">Obat-obatan</div>
                                                <select name="alergi_obat" class="form-control" id="">
                                                    <option value="1" {{($pelayanan->alergi_obat == '1') ? 'Selected': ''}}>1</option>
                                                    <option value="2" {{($pelayanan->alergi_obat == '2') ? 'Selected': ''}}>2</option>
                                                    <option value="3" {{($pelayanan->alergi_obat == '3') ? 'Selected': ''}}>3</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Prognosa</label>
                                        <div class="col-sm-9">
                                            <select name="prognosa" id="" class="form-control">
                                                <option value="Example 1"  {{($pelayanan->prognosa == 'Example 1') ? 'Selected': ''}}>Example 1</option>
                                                <option value="Example 2"  {{($pelayanan->prognosa == 'Example 2') ? 'Selected': ''}}>Example 2</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Terapi Obat</label>
                                        <div class="col-sm-9">
                                            <textarea name="terapi_obat" id="" class="form-control" cols="40" rows="2">{{$pelayanan->terapi_obat}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Terapi Non Obat</label>
                                        <div class="col-sm-9">
                                            <textarea name="terapi_nonobat" id="" class="form-control" cols="40" rows="2">{{$pelayanan->terapi_nonobat}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">BMHP</label>
                                        <div class="col-sm-9">
                                            <textarea name="bmhp" id="" class="form-control" cols="40" rows="2">{{$pelayanan->bmhp}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Diagnosa</label>
                                        <div class="col-sm-9">
                                            <textarea name="diagnosa" id="" class="form-control" cols="40" rows="2">{{$pelayanan->diagnosa}}</textarea>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"  {{($pelayanan->kasus_kll == '1') ? 'checked': ''}} value="1">
                                                    <span class="form-check-sign">Peserta berpotensi menderita penyakit akibat kerja</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Diagnosa #2 <br> (Sekunder)</label>
                                        <div class="col-sm-9">
                                            <textarea name="diagnosa_dua" id="" class="form-control" cols="40" rows="2">{{$pelayanan->diagnosa_dua}}</textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Diagnosa #3 <br> (Sekunder)</label>
                                        <div class="col-sm-9">
                                            <textarea name="diagnosa_tiga" id="" class="form-control" cols="40" rows="2">{{$pelayanan->diagnosa_tiga}}</textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Kesadaran</label>
                                        <div class="col-sm-9">
                                            <select name="kesadaran" id="" class="form-control">
                                                <option value="Example 1"  {{($pelayanan->kesadaran == 'Example 1') ? 'Selected': ''}}>Example 1</option>
                                                <option value="Example 2"  {{($pelayanan->kesadaran == 'Example 2') ? 'Selected': ''}}>Example 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Suhu</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-3">
                                                <input type="text" name="suhu" value="{{$pelayanan->suhu}}" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
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
                                                <input type="text" name="pemeriksaan_tinggi" value="{{$pelayanan->pemeriksaan_tinggi}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">cm</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">Lingkar Perut</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="pemeriksaan_lingkar" value="{{$pelayanan->pemeriksaan_lingkar}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputEmail">Berat Badan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="pemeriksaan_berat" value="{{$pelayanan->pemeriksaan_berat}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">kg</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">IMT</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="pemeriksaan_imt" value="{{$pelayanan->pemeriksaan_imt}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
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
                                                <input type="text" name="td_sistole" value="{{$pelayanan->td_sistole}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">mmHg</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">Diastole</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_diastole" value="{{$pelayanan->td_diastole}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">mmHg</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="inputEmail">Respiratory Rate</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_respiratory" value="{{$pelayanan->td_respiratory}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">/ minute</span>
                                                </div>
                                            </div>
                                            <label for="inputEmail">Heart Rate</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="td_heartrate" value="{{$pelayanan->td_heartrate}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">bpm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">

                                            <legend class="col-form-label col-sm-3 fw-bold">Kasus KLL</legend>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input"  {{($pelayanan->kasus_kll == '1') ? 'checked': ''}} name="kasus_kll" data-toggle='collapse' data-target='#collapsediv1' type="checkbox" value="1">
                                                    <span class="form-check-sign">Kecelakaan Lalu Lintas</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="collapse {{($pelayanan->kasus_kll == '1') ? 'show': ''}}" id="collapsediv1">
                                            <div class="card card-body">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Kejadian</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" value="{{$pelayanan->tanggal_kejadian}}" name="tanggal_kejadian" class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Lokasi Kejadian</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="lokasi_kejadian" id="" class="form-control" cols="40" rows="2">{{$pelayanan->lokasi_kejadian}}</textarea>
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
                                                <option value="Dokter Lain" {{($pelayanan->tenaga_medis == 'Dokter Lain')? 'Selected': ''}}>Dokter Lain</option>
                                                <option value="dr Icon Horizon" {{($pelayanan->tenaga_medis == 'dr Icon Horizon')? 'Selected': ''}}>dr Icon Horizon</option>
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
                                            <textarea name="pelayanan_non_kapitasi" class="form-control" id="" cols="30" rows="10">{{$pelayanan->pelayanan_non_kapitasi}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Status Pulang</label>
                                        <div class="col-sm-9">
                                            <select name="status_pulang" id="" class="form-control">
                                                <option></option>
                                                <option value="Pulang" {{($pelayanan->status_pulang == 'Pulang') ? 'Selected': ''}}>Pulang</option>
                                                <option value="Belum Pulang" {{($pelayanan->status_pulang == 'Belum Pulang') ? 'Selected': ''}}>Belum Pulang</option>
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

        </div>


    </div>
</div>
@endsection