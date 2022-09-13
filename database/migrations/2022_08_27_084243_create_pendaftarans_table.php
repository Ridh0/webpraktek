<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->nullable()->constrained();
            $table->string('tgl_daftar')->nullable();
            $table->string('sumber_data')->nullable();
            $table->string('poli')->nullable();
            $table->string('faskes')->nullable();
            $table->string('no_pendaftaran')->nullable();
            $table->string('jenis_kunjungan')->nullable();
            $table->string('perawatan')->nullable();
            $table->string('poli')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('pemeriksaan_tinggi')->nullable();
            $table->string('pemeriksaan_berat')->nullable();
            $table->string('pemeriksaan_lingkar')->nullable();
            $table->string('pemeriksaan_imt')->nullable();
            $table->string('td_sistole')->nullable();
            $table->string('td_diastole')->nullable();
            $table->string('td_respiratory')->nullable();
            $table->string('td_heartrate')->nullable();
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
        Schema::dropIfExists('pendaftarans');
    }
}
