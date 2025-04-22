@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Data Ruangan</h2>
        @if (session()->has('Success'))
            <div class="alert alert-success" role="alert">
                {{ session('Success') }}
            </div>
        @elseif (session()->has('Failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('Failed') }}
            </div>
        @endif
        <a href="/admin/ruangan/create" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Ruangan</th>
                    <th>Nama Ruangan</th>
                    <th>Gedung</th>
                    <th>Lantai</th>
                    <th>Jenis Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ruangan as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->kode_ruangan }}</td>
                        <td>{{ $item->nama_ruangan }}</td>
                        <td>{{ $item->gedung }}</td>
                        <td>{{ $item->lantai }}</td>
                        <td>{{ $item->jenis_ruangan }}</td>
                        <td>{{ $item->kapasitas }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                        <a href="/admin/ruangan/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/admin/ruangan/{{ $item->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
