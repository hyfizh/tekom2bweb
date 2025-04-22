@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Tambah Data Prodi</h2>
        <a href="/admin/prodi" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Kembali</a>

        <form method="POST" action="/admin/prodi">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="namaprodi" class="form-label">Nama Prodi</label>
                    <input type="text" class="form-control" id="namaprodi" name="namaprodi">
                </div>
                <div class="mb-3">
                    <label for="kodeprodi" class="form-label">Kode Prodi</label>
                    <input type="text" class="form-control" id="kodeprodi" name="kodeprodi">
                </div>
                <div class="mb-3">
                    <label for="jenjangstudi" class="form-label">Jenjang Studi</label>
                    <input type="text" class="form-control" id="jenjangstudi" name="jenjangstudi">
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
@endsection
