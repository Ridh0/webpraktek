<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_kunjungan',
        'pasien_id',
        'pendaftaran_id',
        'perawatan',
        'poli',
        'tanggal_kunjungan',
        'keluhan',
        'anamnesa',
        'alergi_makanan',
        'alergi_udara',
        'alergi_obat',
        'riwayat_alergi',
        'prognosa',
        'terapi_obat',
        'terapi_nonobat',
        'bmhp',
        'diagnosa',
        'diagnosa_dua',
        'diagnosa_tiga',
        'kesadaran',
        'suhu',
        'pemeriksaan_tinggi',
        'pemeriksaan_berat',
        'pemeriksaan_lingkar',
        'pemeriksaan_imt',
        'td_sistole',
        'td_diastole',
        'td_respiratory',
        'td_heartrate',
        'kasus_kll',
        'tanggal_kejadian',
        'lokasi_kejadian',
        'tenaga_medis',
        'pelayanan_non_kapitasi',
        'status_pulang',
     ];
}