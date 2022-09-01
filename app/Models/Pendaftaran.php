<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'tgl_daftar',
        'poli',
        'faskes',
        'sumber_data',
        'no_pendaftaran',
     ];

     public function pasien()
     {
         return $this->belongsTo(Pasien::class);

     }
}
