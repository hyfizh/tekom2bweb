@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Edit Data Mahasiswa</h2>
        <a href="/admin/mahasiswa" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Kembali</a>

        <form method="POST" action="/admin/mahasiswa/{{ $mahasiswa->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="mb-3">
                    <label for="namalengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namalengkap" name="namalengkap"
                        value="{{ old('namalengkap', $mahasiswa->namalengkap) }}" required>
                </div>

                <div class="mb-3">
                    <label for="tgl" class="form-label">Tanggal Lahir</label>
                    <div class="row">
                        <!-- Dropdown Tanggal -->
                        <div class="col-4">
                            <select class="form-select" id="tanggal" name="tanggal" required>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}" {{ (int)\Carbon\Carbon::parse($mahasiswa->tgl)->day == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <!-- Dropdown Bulan -->
                        <div class="col-4">
                            <select class="form-select" id="bulan" name="bulan" required>
                                @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $key => $bulan)
                                    <option value="{{ $key + 1 }}" {{ (int)\Carbon\Carbon::parse($mahasiswa->tgl)->month == $key + 1 ? 'selected' : '' }}>
                                        {{ $bulan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Dropdown Tahun -->
                        <div class="col-4">
                            <select class="form-select" id="tahun" name="tahun" required>
                                @for ($i = 1950; $i <= \Carbon\Carbon::now()->year; $i++) <!-- Mengambil tahun dari 1950 hingga tahun sekarang -->
                                    <option value="{{ $i }}" {{ \Carbon\Carbon::parse($mahasiswa->tgl)->year == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-2 mt-2">
                    <label for="jeniskelamin" class="form-label"><strong>Jenis Kelamin</strong></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="jeniskelamin_laki" name="jeniskelamin" value="Laki-laki" 
                            {{ $mahasiswa->jeniskelamin == 'Laki-laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jeniskelamin_laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="jeniskelamin_perempuan" name="jeniskelamin" value="Perempuan" 
                            {{ $mahasiswa->jeniskelamin == 'Perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jeniskelamin_perempuan">Perempuan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim"
                        value="{{ old('nim', $mahasiswa->nim) }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $mahasiswa->email) }}" required>
                </div>
                <div class="mb-3">
                    <label for="notelp" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" id="notelp" name="notelp"
                        value="{{ old('notelp', $mahasiswa->notelp) }}" required>
                </div>
                <div class="mb-3">
                    <label for="prodi_id" class="form-label">Prodi</label>
                    <select class="form-select" id="prodi_id" name="prodi_id" required>
                        <option value="">Pilih Prodi</option>
                        @foreach ($prodis as $prodi)
                            <option value="{{ $prodi->id }}" {{ $prodi->id == $mahasiswa->prodi_id ? 'selected' : '' }}>
                                {{ $prodi->namaprodi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jurusan_id" class="form-label">Jurusan</label>
                    <select class="form-select" id="jurusan_id" name="jurusan_id" required>
                        <option value="">Pilih Jurusan</option>
                        @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}" {{ $jurusan->id == $mahasiswa->jurusan_id ? 'selected' : '' }}>
                                {{ $jurusan->namajurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
@endsection
