<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->integer('no_pendaftaran')->nullable();
            $table->string('nama')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('tgl')->nullable();
            $table->string('kelamin')->nullable();
            $table->string('nohp')->nullable();
            $table->string('rekam_medis')->nullable();
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
        Schema::dropIfExists('pasiens');
    }
}
