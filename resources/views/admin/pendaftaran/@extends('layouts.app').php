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
            <div class="col-md-6">
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
                                <form method="post" action="{{route('pasien.store')}}">
                                    @csrf
                                    @method('post')
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Daftar</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="tgl" class="form-control" id="inputEmail3" placeholder="No BPJS">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Poli</label>
                                        <div class="col-sm-9">
                                            <select name="poli" id="" class="form-control">
                                                <option value="">Poli Umum</option>
                                                <option value="">Poli Khusus</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Faskes</label>
                                        <div class="col-sm-9">
                                            <select name="poli" id="" class="form-control">
                                                <option value="">Poli Umum</option>
                                                <option value="">Poli Khusus</option>
                                            </select>
                                        </div>
                                    </div>


                                    <fieldset class="form-group">
                                        <div class="row">

                                            <legend class="col-form-label col-sm-3 fw-bold">Sumber Data</legend>
                                            <div class="col-sm-9 d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin" id="gridRadios1" value="Laki - Laki">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        No Antrian
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin" id="gridRadios2" value="Perempuan">
                                                    <label class="form-check-label" for="gridRadios2">
                                                        No Kartu
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>



                                </form>


                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <form action="{{ route('pendaftaran.create') }}" method="GET">
                                                @csrf
                                                <input type="text" name="search" />
                                                <button type="submit">Search</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control" id="inputPassword3" placeholder="Nama">
                                    </div>
                                </div>

                                @if($posts->isNotEmpty())
                                @foreach ($posts as $post)
                                <div class="post-list">
                                    <p>{{ $post->nama }}</p>
                                </div>
                                @endforeach
                                @else
                                <div>
                                    <h2>No posts found</h2>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
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