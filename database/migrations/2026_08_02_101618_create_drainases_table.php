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
        Schema::create('drainase', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelurahan_id')->constrained('kelurahan')->restrictOnDelete();
            $table->string('nama_lokasi', 150);
            $table->integer('panjang_meter');
            $table->integer('lebar_cm');
            $table->string('jenis_drainase', 30);
            $table->string('kondisi', 30);
            $table->integer('tahun_pendanaan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drainase');
    }
};