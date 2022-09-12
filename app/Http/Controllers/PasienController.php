<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Pasien::all();
        return view('admin.pasien.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $no_pendaftaran = 1;
        foreach ($pasien as $row) {

            $id = $row->no_pendaftaran;
            $norm = $row->rekam_medis;
            $noUrut = (int) substr($norm, 0, 6);
            $noUrut++;
            $no_rms =  sprintf("%06s", $noUrut);
            $no_rm =  sprintf("%02s", $noUrut);
            $no_rm1 = substr($no_rms, 0, 2);    
            $no_rm2 = substr($no_rms, 2, 2);    
            $no_rm3 = substr($no_rms, 4, 2);    

            $no_pendaftaran = $id + 1;
        }
        return view('admin.pasien.create', compact('no_pendaftaran', 'no_rm1', 'no_rm2', 'no_rm3','no_rms'));
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
            'no_pendaftaran' => 'required',
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
            'no_pendaftaran' => $request->no_pendaftaran,
            'kelamin' => $request->kelamin,
            'nohp' => $request->nohp,
            'rekam_medis' => $request->rekam_medis,
        ]);
        return back()->with('success', 'ss');
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
        return view('admin.pasien.edit', compact('pasien'));
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
        $this->validate($request, [
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
    public function hapus($pasien)
    {
        $mahasiswa = Pasien::find($pasien);
        $mahasiswa->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Data !');
        return back()->with('success', "Data telah berhasil dideleted !!.");
    }
}
