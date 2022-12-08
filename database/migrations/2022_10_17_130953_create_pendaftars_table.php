<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('divisi_id');
            $table->foreignId('agama_id');
            $table->string('nohp');
            $table->string('nim');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_th_lahir');
            $table->string('jekel');
            $table->string('alamat');
            $table->longText('tujuan');
            $table->year('tahun_masuk');
            $table->string('gambar');
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
        Schema::dropIfExists('pendaftars');
    }
};
