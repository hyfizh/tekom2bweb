@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Data Mahasiswa</h2>

        @if (session()->has('Success'))
            <div class="alert alert-success" role="alert">
                {{ session('Success') }}
            </div>
        @elseif (session()->has('Failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('Failed') }}
            </div>
        @endif

        <a href="/admin/mahasiswa/create" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">
            Tambah Data
        </a>

        <div class="table-responsive">
            <table class="table table-bordered table-sm text-center" style="font-size: 12px;">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>NIM</th>
                        <th>Program Studi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $item->namalengkap }}</td>
                            <td>
                                @if ($item->jeniskelamin === 'Laki-laki')
                                    Laki-Laki
                                @elseif ($item->jeniskelamin === 'Perempuan')
                                    Perempuan
                                @else
                                    Tidak Diisi
                                @endif
                            </td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->dataprodi->namaprodi }}</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <a href="/admin/mahasiswa/{{ $item->id }}/edit" class="btn btn-warning btn-sm me-1">Edit</a>
                                    <form action="/admin/mahasiswa/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                                    </form>
                                    <a href="{{ url('/admin/mahasiswa/' . $item->id . '/detail') }}" 
                                       class="btn btn-dark btn-sm ms-1">Detail</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
