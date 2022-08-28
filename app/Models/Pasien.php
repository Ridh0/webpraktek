<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
       'nama',
       'bpjs',
       'tgl',
       'kelamin',
       'nohp',
       'rekam_medis',
    ];
}
