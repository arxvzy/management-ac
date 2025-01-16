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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jasa');
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->unsignedBigInteger('id_pelanggan');
            $table->date('jadwal');
            $table->float('harga_awal');
            $table->float('harga_akhir')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->dateTime('tgl_pengerjaan')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_survey_sent')->default(false);
            $table->text('testimoni')->nullable(); 
            $table->text('deskripsi')->nullable();  
            $table->timestamps();

            $table->foreign('id_jasa')->references('id')->on('jasa');
            $table->foreign('id_pengguna')->references('id')->on('pengguna');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
