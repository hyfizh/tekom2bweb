@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Data Dosen</h2>
        @if (session()->has('Success'))
            <div class="alert alert-success" role="alert">
                {{ session('Success') }}
            </div>
        @elseif (session()->has('Failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('Failed') }}
            </div>
        @endif
        <a href="/admin/dosen/create" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis kelamin</th>
                    <th>NIDN</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>No Telfon</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosen as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->namalengkap }}</td>
                        <td>
                            @if($item->jeniskelamin == 'L')
                            Laki-Laki 
                            @elseif($item->jeniskelamin == 'P')
                            Perempuan
                            @endif
                        </td>
                        <td>{{ $item->nidn }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->notelp }}</td>
                        <td>{{ $item->datajurusan->namajurusan }}</td>
                        <td>
                            <a href="/admin/dosen/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/admin/dosen/{{ $item->id }}" method="POST" class="d-inline">
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
