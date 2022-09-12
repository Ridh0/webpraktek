<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countpasien = Pasien::all()->count();
        $countpelayanan = Pelayanan::all()->count();
        $countpendaftaran = Pendaftaran::all()->count();
        return view('admin.index',compact('countpasien','countpelayanan','countpendaftaran'));
    }
}
