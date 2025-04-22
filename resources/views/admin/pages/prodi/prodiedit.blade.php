@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Edit Data Prodi</h2>
        <a href="/admin/prodi" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Kembali</a>

        <form method="POST" action="/admin/prodi/{{ $prodi->id }}">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->
            <div>
                <div class="mb-3">
                    <label for="namaprodi" class="form-label">Nama Prodi</label>
                    <input type="text" class="form-control @error('namaprodi') is-invalid @enderror" id="namaprodi"
                        name="namaprodi" value="{{ old('namaprodi', $prodi->namaprodi) }}" required>
                    @error('namaprodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kodeprodi" class="form-label">Kode Prodi</label>
                    <input type="text" class="form-control @error('kodeprodi') is-invalid @enderror" id="kodeprodi"
                        name="kodeprodi" value="{{ old('kodeprodi', $prodi->kodeprodi) }}" required>
                    @error('kodeprodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenjangstudi" class="form-label">Jenjang Studi</label>
                    <input type="text" class="form-control @error('jenjangstudi') is-invalid @enderror" id="jenjangstudi"
                        name="jenjangstudi" value="{{ old('jenjangstudi', $prodi->jenjangstudi) }}" required>
                    @error('jenjangstudi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
@endsection
