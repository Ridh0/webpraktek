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
            $table->string('perawatan')->nullable();
            $table->string('poli')->nullable();
            $table->string('tanggal_kunjungan')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('anamnesa')->nullable();
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
            $table->string('pemeriksaan')->nullable();
            $table->string('tekanan_darah')->nullable();
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
