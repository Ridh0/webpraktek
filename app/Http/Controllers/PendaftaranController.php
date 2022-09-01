<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pendaftaran::with('pasien')->get();
        return view('admin.pendaftaran.index',compact('data'));
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
        if($search){

            $datasearch =$search;
            $posts = Pasien::query()
            ->where('no_pendaftaran', 'LIKE', "%{$search}%")
            ->get();
        }
        $pendaftaran = Pendaftaran::latest()->first();
            $pid = $pendaftaran->id;
        return view('admin.pendaftaran.create',compact('posts','datasearch','pendaftaran','pid'));

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
            'nama' => 'nullable',
            'pasien_id' => 'nullable',
            'tgl_daftar' => 'nullable',
            'poli' => 'nullable',
            'faskes' => 'nullable',
            'sumber_data' => 'nullable',
            'no_pendaftaran' => 'nullable',
        ]);
       
        Pendaftaran::create([
           'tgl_daftar' => $request->tgl_daftar,
            'poli' => $request->poli,
            'faskes' => $request->faskes,
            'sumber_data' => $request->sumber_data,
            'no_pendaftaran' => $request->no_pendaftaran,
            'pasien_id' => $request->pasien_id,
            'nama' => $request->nama,
        ]);
    

        return back()->with('success','ss' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        $pasien = Pasien::all();
        return view('admin.pendaftaran.edit',compact('pendaftaran','pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $this->validate($request, [
            'nama' => 'nullable',
            'pasien_id' => 'nullable',
            'tgl_daftar' => 'nullable',
            'poli' => 'nullable',
            'faskes' => 'nullable',
            'sumber_data' => 'nullable',
            'no_pendaftaran' => 'nullable',
        ]);
        $data = Pendaftaran::find($request->id);

        $data->update([
           'tgl_daftar' => $request->tgl_daftar,
            'poli' => $request->poli,
            'faskes' => $request->faskes,
            'sumber_data' => $request->sumber_data,
            'no_pendaftaran' => $request->no_pendaftaran,
            'pasien_id' => $request->pasien_id,
            'nama' => $request->nama,
        ]);
       
         Alert::success('Berhasil', 'Berhasil Mengubah Data !');
        return back()->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function hapus( $pendaftaran)
    {
        $data = Pendaftaran::find($pendaftaran);
        $data->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data !');
        return back()->with('success', "Data telah berhasil dideleted !!."); 
    }
}
