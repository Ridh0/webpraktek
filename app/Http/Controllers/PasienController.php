<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pasien::all();
        return view('admin.pasien.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pasien.create');
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
            'nama' => 'required',
            'bpjs' => 'required',
            'tgl' => 'required',
            'kelamin' => 'required',
            'nohp' => 'required',
            'rekam_medis' => 'required',
        ]);
       
        Pasien::create([
           'nama' => $request->nama,
            'bpjs' => $request->bpjs,
            'tgl' => $request->tgl,
            'kelamin' => $request->kelamin,
            'nohp' => $request->nohp,
            'rekam_medis' => $request->rekam_medis,
        ]);
        return back()->with('success','ss' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('admin.pasien.edit',compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $this->validate($request,[
            'nama' => 'required',
            'bpjs' => 'required',
            'tgl' => 'required',
            'kelamin' => 'required',
            'nohp' => 'required',
            'rekam_medis' => 'required',
        ]);
        $data = Pasien::find($request->id);
      
        $data->update([
            'nama' => $request->nama,
            'bpjs' => $request->bpjs,
            'tgl' => $request->tgl,
            'kelamin' => $request->kelamin,
            'nohp' => $request->nohp,
            'rekam_medis' => $request->rekam_medis,
        ]);
        return back()->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function hapus( $pasien)
    {
        $mahasiswa = Pasien::find($pasien);
        $mahasiswa->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data !');
        return back()->with('success', "Data telah berhasil dideleted !!."); 
    }
}
