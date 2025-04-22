@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Tambah Data Dosen</h2>
        <a href="/admin/dosen" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Kembali</a>

        <form method="POST" action="/admin/dosen/">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="namalengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namalengkap" name="namalengkap" required>
                </div>
                <div class="mb-2 mt-2">
                        <label for="jeniskelamin" class="form-label"><strong>Jenis Kelamin</strong> </label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="jeniskelamin_laki" name="jeniskelamin" value="L">
                            <label class="form-check-label" for="jeniskelamin_laki">Laki-laki</label><br>
                        </div>
                    </div>
                    <div class="mb-2 mt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="jeniskelamin_perempuan" name="jeniskelamin" value="P">
                            <label class="form-check-label" for="jeniskelamin_perempuan">Perempuan</label>
                        </div>
                    </div>
                <div class="mb-3">
                    <label for="nidn" class="form-label">NIDN</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" required>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="notelp" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" id="notelp" name="notelp" required>
                </div>
                <div class="mb-3">
                    <label for="jurusan_id" class="form-label">Jurusan</label>
                    <select class="form-select" id="jurusan_id" name="jurusan_id" required>
                        <option value="">Pilih Jurusan</option>
                        @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}">{{ $jurusan->namajurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>

    </div>
@endsection
