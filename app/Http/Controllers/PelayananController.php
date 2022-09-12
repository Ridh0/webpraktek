<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelayananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelayanan::with('pasien')->with('pendaftaran')->get();
        return view('admin.pelayanan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $search = $request->input('search');
        $posts = Pasien::where('no_pendaftaran',$search)->get() ;
        $datasearch =$search;
        $pelayanan = Pelayanan::where('id',$datasearch)->get();
        if($search){

            $datasearch =$search;
            $pelayanan = Pelayanan::where('id',$datasearch)->get();
            $posts = Pasien::query()
            ->where('no_pendaftaran', 'LIKE', "%{$search}%")
            ->get();
        }
        $pendaftaran = Pendaftaran::latest()->first();
            $pid = $pendaftaran->id;
        return view('admin.pelayanan.create',compact('posts','datasearch','pendaftaran','pid','pelayanan'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_kunjungan' => 'nullable',
        ]);
       $tanggal_kunjungan =  $request->tgl_kunjungan . ' ' . $request->wkt_kunjungan;
        Pelayanan::create([
            'jenis_kunjungan' => $request-> jenis_kunjungan ,
            'pasien_id' => $request->   pasien_id ,
            'pendaftaran_id' => $request->  pendaftaran_id ,
            'perawatan' => $request->   perawatan ,
            'poli' => $request-> poli ,
            'tanggal_kunjungan' => $request->tgl_kunjungan ,
            'waktu_kunjungan' => $request->wkt_kunjungan ,
            'keluhan' => $request-> keluhan ,
            'anamnesa' => $request-> anamnesa ,
            'alergi_makanan' => $request-> alergi_makanan ,
            'alergi_udara' => $request-> alergi_udara ,
            'alergi_obat' => $request-> alergi_obat ,
            'riwayat_alergi' => $request->  riwayat_alergi ,
            'prognosa' => $request-> prognosa ,
            'terapi_obat' => $request-> terapi_obat ,
            'terapi_nonobat' => $request-> terapi_nonobat ,
            'bmhp' => $request-> bmhp ,
            'diagnosa' => $request-> diagnosa ,
            'diagnosa_dua' => $request-> diagnosa_dua ,
            'diagnosa_tiga' => $request-> diagnosa_tiga ,
            'kesadaran' => $request-> kesadaran ,
            'suhu' => $request-> suhu ,
            'pemeriksaan_tinggi' => $request-> pemeriksaan_tinggi ,
            'pemeriksaan_berat' => $request-> pemeriksaan_berat ,
            'pemeriksaan_lingkar' => $request-> pemeriksaan_lingkar ,
            'pemeriksaan_imt' => $request-> pemeriksaan_imt ,
            'td_sistole' => $request-> td_sistole,
            'td_diastole' => $request-> td_diastole ,
            'td_respiratory' => $request-> td_respiratory ,
            'td_heartrate' => $request-> td_heartrate ,
            'kasus_kll' => $request-> kasus_kll ,
            'tanggal_kejadian' => $request-> tanggal_kejadian ,
            'lokasi_kejadian' => $request-> lokasi_kejadian ,
            'tenaga_medis' => $request-> tenaga_medis ,
            'pelayanan_non_kapitasi' => $request-> pelayanan_non_kapitasi ,
            'status_pulang' => $request-> status_pulang ,
        ]);
    

        return back()->with('success','ss' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelayanan $pelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelayanan $pelayanan)
    {
        return view('admin.pelayanan.edit',compact('pelayanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelayanan $pelayanan)
    {
        $this->validate($request, [
            'jenis_kunjungan' => 'nullable',
        ]);
        $data = Pelayanan::find($request->id);

        $data->update([
            'jenis_kunjungan' => $request-> jenis_kunjungan ,
            'pasien_id' => $request->   pasien_id ,
            'pendaftaran_id' => $request->  pendaftaran_id ,
            'perawatan' => $request->   perawatan ,
            'poli' => $request-> poli ,
            'tanggal_kunjungan' => $request->tgl_kunjungan ,
            'waktu_kunjungan' => $request->wkt_kunjungan ,
            'keluhan' => $request-> keluhan ,
            'anamnesa' => $request-> anamnesa ,
            'alergi_makanan' => $request-> alergi_makanan ,
            'alergi_udara' => $request-> alergi_udara ,
            'alergi_obat' => $request-> alergi_obat ,
            'riwayat_alergi' => $request->  riwayat_alergi ,
            'prognosa' => $request-> prognosa ,
            'terapi_obat' => $request-> terapi_obat ,
            'terapi_nonobat' => $request-> terapi_nonobat ,
            'bmhp' => $request-> bmhp ,
            'diagnosa' => $request-> diagnosa ,
            'diagnosa_dua' => $request-> diagnosa_dua ,
            'diagnosa_tiga' => $request-> diagnosa_tiga ,
            'kesadaran' => $request-> kesadaran ,
            'suhu' => $request-> suhu ,
            'pemeriksaan_tinggi' => $request-> pemeriksaan_tinggi ,
            'pemeriksaan_berat' => $request-> pemeriksaan_berat ,
            'pemeriksaan_lingkar' => $request-> pemeriksaan_lingkar ,
            'pemeriksaan_imt' => $request-> pemeriksaan_imt ,
            'td_sistole' => $request-> td_sistole,
            'td_diastole' => $request-> td_diastole ,
            'td_respiratory' => $request-> td_respiratory ,
            'td_heartrate' => $request-> td_heartrate ,
            'kasus_kll' => $request-> kasus_kll ,
            'tanggal_kejadian' => $request-> tanggal_kejadian ,
            'lokasi_kejadian' => $request-> lokasi_kejadian ,
            'tenaga_medis' => $request-> tenaga_medis ,
            'pelayanan_non_kapitasi' => $request-> pelayanan_non_kapitasi ,
            'status_pulang' => $request-> status_pulang ,
        ]);
    
        Alert::success('Berhasil', 'Berhasil Mengubah Data !');
        return back()->with('success','ss' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelayanan  $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelayanan $pelayanan)
    {
        //
    }
}
