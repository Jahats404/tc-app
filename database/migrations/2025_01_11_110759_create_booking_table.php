<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->string('id_booking')->primary();
            $table->string('nama');
            $table->string('email');
            $table->string('no_wa');
            $table->string('event');
            $table->date('tanggal')->nullable();
            $table->time('jam')->nullable();
            $table->string('universitas');
            $table->string('fakultas');
            $table->string('lokasi_foto');
            $table->string('ig_vendor')->nullable();
            $table->string('ig_client')->nullable();
            $table->string('post_foto');
            $table->string('jumlah_anggota');
            $table->string('req_khusus')->nullable();
            $table->string('status_booking');

            $table->string('negara')->nullable();
            $table->string('kota')->nullable();
            $table->string('dp')->nullable();
            $table->text('file_dp')->nullable();
            $table->string('jam_selesai')->nullable();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('harga_paket_id');
            $table->foreign('harga_paket_id')->references('id_harga_paket')->on('harga_paket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};