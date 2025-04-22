@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Edit Data Jurusan</h2>
        <a href="/admin/jurusan" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Kembali</a>

        <form method="POST" action="/admin/jurusan/{{ $jurusan->id }}/edit">
            @csrf
            @method('put')
            <div>
                <div class="mb-3">
                    <label for="namajurusan" class="form-label">Nama Jurusan</label>
                    <input type="text" class="form-control" id="namajurusan" name="namajurusan"
                        value="{{ $jurusan->namajurusan }}">
                </div>
                <div class="mb-3">
                    <label for="kodejurusan" class="form-label">Kode Jurusan</label>
                    <input type="text" class="form-control" id="kodejurusan" name="kodejurusan"
                        value="{{ $jurusan->kodejurusan }}">
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
@endsection
