@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Edit Data Ruangan</h2>
        <a href="/admin/ruangan" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Kembali</a>

        <form method="POST" action="/admin/ruangan/{{ $ruangan->id }}/edit">
            @csrf
            @method('PUT')
            <div>
                <div class="mb-3">
                    <label for="kode_ruangan" class="form-label">Kode ruangan</label>
                    <input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan"
                        value="{{ old('kode_ruangan', $ruangan->kode_ruangan) }}">
                </div>
                <div class="mb-3">
                    <label for="nama_ruangan" class="form-label">Nama ruangan</label>
                    <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan"
                        value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}">
                </div>
                <div class="mb-3">
                    <label for="gedung" class="form-label">Gedung</label>
                    <input type="text" class="form-control" id="gedung" name="gedung"
                        value="{{ old('gedung', $ruangan->gedung) }}">
                </div>
                <div class="mb-3">
                    <label for="lantai" class="form-label">lantai</label>
                    <input type="text" class="form-control" id="lantai" name="lantai"
                        value="{{ old('lantai', $ruangan->lantai) }}">
                </div>
                <div class="mb-3">
                    <label for="jenis_ruangan" class="form-label">Jenis Ruangan</label>
                    <input type="text" class="form-control" id="jenis_ruangan" name="jenis_ruangan"
                        value="{{ old('jenis_ruangan', $ruangan->jenis_ruangan) }}">
                </div>
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="text" class="form-control" id="kapasitas" name="kapasitas"
                        value="{{ old('kapasitas', $ruangan->kapasitas) }}">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $ruangan->keterangan) }}</textarea>
                </div>

                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
@endsection
