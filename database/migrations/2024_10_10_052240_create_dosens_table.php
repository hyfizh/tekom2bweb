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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('namalengkap');
            $table->string('jeniskelamin');
            $table->string('nidn')->unique()->default('-');
            $table->string('nip')->unique()->default('-');
            $table->string('email')->uniqie()->default('-');
            $table->string('notelp')->unique()->default('-');
            $table->unsignedBigInteger('jurusan_id')->reqired();
            $table->foreign('jurusan_id')->references('id')->on('jurusans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
