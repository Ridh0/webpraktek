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
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">No Rekam Medis | {{$no_rm1}}.{{$no_rm2}}.{{$no_rm3}}</div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{route('pasien.store')}}">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                                <input type="hidden" name="rekam_medis" value="{{$no_rms}}">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">No BPJS</label>
                                <div class="col-sm-10">
                                    <input type="text" name="bpjs" class="form-control" id="inputEmail3" placeholder="No BPJS">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" id="inputPassword3" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">No Pendaftaran</label>
                                <div class="col-sm-10">
                                    <input type="text" name="no_pendaftaran" value="{{$no_pendaftaran}}" class="form-control" id="inputPassword3" placeholder="Nama">
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Kelamin</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kelamin" id="gridRadios1" value="Laki - Laki">
                                            <label class="form-check-label" for="gridRadios1">
                                                Laki - Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kelamin" id="gridRadios2" value="Perempuan">
                                            <label class="form-check-label" for="gridRadios2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl" id="inputPassword3" placeholder="Tanggal Lahir">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">No Handphone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nohp" class="form-control" id="inputPassword3" placeholder="No Handphone">
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
@endsection