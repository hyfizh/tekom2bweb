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
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('koderuangan')->default('-');
            $table->string('namaruangan')->default('-');
            $table->string('gedung')->default('-');
            $table->string('lantai')->default('-');
            $table->string('jenis_ruangan')->default('-');
            $table->string('kapasitas')->default('-');
            $table->text('keterangan')->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangans');
    }
};
