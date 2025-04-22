@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2 class="mb-5">Detail Mahasiswa</h2>
        @if (session()->has('Success'))
            <div class="alert alert-success" role="alert">
                {{ session('Success') }}
            </div>
        @elseif (session()->has('Failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('Failed') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('images/' . ($mahasiswa->image ?? 'profil.jpg')) }}" 
                     alt="Image" class="img-fluid rounded" 
                     style="width:350px;height:350px;">
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $mahasiswa->namalengkap }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ \Carbon\Carbon::parse($mahasiswa->tgl)->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            @if ($mahasiswa->jeniskelamin == 'Laki-laki')
                                Laki-Laki
                            @elseif ($mahasiswa->jeniskelamin == 'Perempuan')
                                Perempuan
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <td>{{ $mahasiswa->nim }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $mahasiswa->email }}</td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td>{{ $mahasiswa->notelp }}</td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td>{{ $mahasiswa->dataprodi->namaprodi }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>{{ $mahasiswa->datajurusan->namajurusan }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div>
            <a href="/admin/mahasiswa" class="btn btn-secondary my-3 float-end">Kembali</a>
        </div>
    @endsection
