@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Data Jurusan</h2>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('Success') }}
            </div>
        @elseif (session()->has('success'))
            <div class="alert alert-danger" role="alert">
                {{ session('Failed') }}
            </div>
        @endif
        <a href="/admin/jurusan/create" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jurusan</th>
                    <th>Kode Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->namajurusan }}</td>
                        <td>{{ $item->kodejurusan }}</td>
                        <td>
                            <a href="/admin/jurusan/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/admin/jurusan/{{ $item->id }}" method="POST" class="d-inline">
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
