<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kunjungan')->nullable();
            $table->unsignedBigInteger('pasien_id')->nullable();
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->unsignedBigInteger('pendaftaran_id')->nullable();
            $table->foreign('pendaftaran_id')->references('id')->on('pendaftarans')->onDelete('cascade');
            $table->string('perawatan')->nullable();
            $table->string('poli')->nullable();
            $table->string('tanggal_kunjungan')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('anamnesa')->nullable();
            $table->string('alergi_makanan')->nullable();
            $table->string('alergi_udara')->nullable();
            $table->string('alergi_obat')->nullable();
            $table->string('riwayat_alergi')->nullable();
            $table->string('prognosa')->nullable();
            $table->string('terapi_obat')->nullable();
            $table->string('toreapi_nonobat')->nullable();
            $table->string('bmhp')->nullable();
            $table->string('diagnosa')->nullable();
            $table->string('diagnosa_dua')->nullable();
            $table->string('diagnosa_tiga')->nullable();
            $table->string('kesadaran')->nullable();
            $table->string('suhu')->nullable();
            $table->string('pemeriksaan_tinggi')->nullable();
            $table->string('pemeriksaan_berat')->nullable();
            $table->string('pemeriksaan_lingkar')->nullable();
            $table->string('pemeriksaan_imt')->nullable();
            $table->string('td_sistole')->nullable();
            $table->string('td_diastole')->nullable();
            $table->string('td_respiratory')->nullable();
            $table->string('td_heartrate')->nullable();
            $table->string('kasus_kll')->nullable();
            $table->string('tanggal_kejadian')->nullable();
            $table->string('lokasi_kejadian')->nullable();
            $table->string('tenaga_medis')->nullable();
            $table->string('pelayanan_non_kapitasi')->nullable();
            $table->string('status_pulang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelayanans');
    }
}
