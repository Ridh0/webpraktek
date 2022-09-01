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
                                <a href="{{route('pasien.create')}}" class="btn btn-primary">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" id="pendaftaran-form" action="{{route('pendaftaran.update')}}">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label for="inputtanggaldaftar" class="col-sm-3 col-form-label">Tanggal Daftar</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="id" value="{{$pendaftaran->id}}">
                                            <input type="date" value="{{$pendaftaran->tgl_daftar}}" name="tgl_daftar" class="form-control" id="inputtanggaldaftar" placeholder="No BPJS">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputfaskes" class="col-sm-3 col-form-label">No Pendaftaran</label>
                                        <div class="col-sm-9">
                                            <select name="pasien_id" style="width:100%;" class=" form-control">
                                                @foreach ($pasien as $row)
                                                <option value="{{$row->id}}" {{($row->id == $pendaftaran->pasien_id) ? 'Selected' : '' }}>{{$row->id}}-{{$row->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputpoli" class="col-sm-3 col-form-label">Poli</label>
                                        <div class="col-sm-9">
                                            <select name="poli" id="inputpoli" class="form-control">
                                                <option value="Poli Umum" {{($pendaftaran->poli == 'Poli Umum') ? 'Selected': ''}}>Poli Umum</option>
                                                <option value="Poli Khusus" {{($pendaftaran->poli == 'Poli Khusus') ? 'Selected': ''}}>Poli Khusus</option>
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
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadios1" value="No Antrian" {{($pendaftaran->sumber_data == 'No Antrian') ? 'Checked': ''}}>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        No Antrian
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sumber_data" id="gridRadios2" value="No Kartu" {{($pendaftaran->sumber_data == 'No Kartu') ? 'Checked': ''}}>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        No Kartu
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

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