<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    }
    public function show($id)
{
    $mahasiswa = Mahasiswa::find($id);  // Ambil data mahasiswa berdasarkan ID
    return view('mahasiswa.show', compact('mahasiswa'));  // Kirim data mahasiswa ke view
}
}
