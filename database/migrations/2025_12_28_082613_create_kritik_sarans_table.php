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
        Schema::create('kritik_saran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_pelanggan')->nullable();
            $table->text('kritik_saran')->nullable();
            $table->timestamps();
        
            $table->foreign('id_order')->references('id')->on('order')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kritik_sarans');
    }
};
