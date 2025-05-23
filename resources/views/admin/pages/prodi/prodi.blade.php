@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Data Program Studi</h2>
        @if (session()->has('Success'))
            <div class="alert alert-success" role="alert">
                {{ session('Success') }}
            </div>
        @elseif (session()->has('Failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('Failed') }}
            </div>
        @endif
        <a href="/admin/prodi/create" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Prodi</th>
                    <th>Kode Prodi</th>
                    <th>Jenjang Studi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prodi as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->namaprodi }}</td>
                        <td>{{ $item->kodeprodi }}</td>
                        <td>{{ $item->jenjangstudi }}</td>
                        <td>
                            <a href="/admin/prodi/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/admin/prodi/{{ $item->id }}" method="POST" class="d-inline">
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
