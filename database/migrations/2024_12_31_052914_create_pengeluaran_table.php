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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan')->nullable();
            $table->float('nominal');
            $table->dateTime('tgl_pembelian');
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->foreign('id_pengguna')->references('id')->on('pengguna')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
