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

                    <div class="card-title">User Statistics</div>
                    <div class="card-tools">
                        <a href="{{route('pelayanan.create')}}" class="btn btn-info btn-border btn-round btn-sm mr-2">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Tambah Data
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
                                        <th scope="col">Jenis Kunjungan</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">No Pendaftaran</th>
                                        <th scope="col">Perawatan</th>
                                        <th scope="col">Poli</th>
                                        <th scope="col">Tanggal Kunjungan</th>
                                        <th scope="col">Keluhan</th>
                                        <th scope="col">Anamnesa</th>
                                        <th scope="col">Alergi Makanan</th>
                                        <th scope="col">Alergi Udara</th>
                                        <th scope="col">Alergi Obat</th>
                                        <th scope="col">Riwayat Alergi</th>
                                        <th scope="col">Prognosa</th>
                                        <th scope="col">Terapi Obat</th>
                                        <th scope="col">Terapi Non Obat</th>
                                        <th scope="col">BMHP</th>
                                        <th scope="col">Diagnosa</th>
                                        <th scope="col">Diagnosa #2</th>
                                        <th scope="col">Diagnosa #3</th>
                                        <th scope="col">Kesadaran</th>
                                        <th scope="col">Suhu</th>
                                        <th scope="col">Tinggi Badan</th>
                                        <th scope="col">Berat Badan</th>
                                        <th scope="col">Lingkar Pinggang</th>
                                        <th scope="col">IMT</th>
                                        <th scope="col">Tekanan Darah Sistole</th>
                                        <th scope="col">Tekanan Darah Diastole</th>
                                        <th scope="col">Tekanan Darah Respiratory</th>
                                        <th scope="col">Tekanan Darah Heart Rate</th>
                                        <th scope="col">Kasus Kecelakaan</th>
                                        <th scope="col">Tanggal Kejadian</th>
                                        <th scope="col">Lokasi Kejadian</th>
                                        <th scope="col">Tenaga Medis</th>
                                        <th scope="col">Pelayanan Non Kapitasi</th>
                                        <th scope="col">Status Pulang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('pelayanan.edit',$row)}}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                                <a href="{{route('pelayanan.hapus',$row)}}" class="btn btn-sm btn-primary show_confirm">Hapus</a>
                                            </div>
                                        </td>
                                        <td>{{$row->jenis_kunjungan}}</td>
                                        <td>{{ ($row->pasien_id != null) ?  $row->pasien->nama : ''}}</td>
                                        <td>{{($row->pendaftaran_id != null) ? $row->pendaftaran->no_pendaftaran :''}}</td>
                                        <td>{{$row->perawatan}}</td>
                                        <td>{{$row->poli}}</td>
                                        <td>{{$row->tanggal_kunjungan}}</td>
                                        <td>{{$row->keluhan}}</td>
                                        <td>{{$row->anamnesa}}</td>
                                        <td>{{$row->alergi_makanan}}</td>
                                        <td>{{$row->alergi_udara}}</td>
                                        <td>{{$row->alergi_obat}}</td>
                                        <td>{{$row->riwayat_alergi}}</td>
                                        <td>{{$row->prognosa}}</td>
                                        <td>{{$row->terapi_obat}}</td>
                                        <td>{{$row->terapi_nonobat}}</td>
                                        <td>{{$row->bmhp}}</td>
                                        <td>{{$row->diagnosa}}</td>
                                        <td>{{$row->diagnosa_dua}}</td>
                                        <td>{{$row->diagnosa_tiga}}</td>
                                        <td>{{$row->kesadaran}}</td>
                                        <td>{{$row->suhu}}</td>
                                        <td>{{$row->pemeriksaan_tinggi}}</td>
                                        <td>{{$row->pemeriksaan_berat}}</td>
                                        <td>{{$row->pemeriksaan_lingkar}}</td>
                                        <td>{{$row->pemeriksaan_imt}}</td>
                                        <td>{{$row->td_sistole}}</td>
                                        <td>{{$row->td_diastole}}</td>
                                        <td>{{$row->td_respiratory}}</td>
                                        <td>{{$row->td_heartrate}}</td>
                                        <td>{{$row->kasus_kll}}</td>
                                        <td>{{$row->tanggal_kejadian}}</td>
                                        <td>{{$row->lokasi_kejadian}}</td>
                                        <td>{{$row->tenaga_medis}}</td>
                                        <td>{{$row->pelayanan_non_kapitasi}}</td>
                                        <td>{{$row->status_pulang}}</td>
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