@extends('admin.layouts.template')

@section('main')
    <div class="card m-1 p-4">
        <h2>Tambah Data Mahasiswa</h2>
        <a href="/admin/mahasiswa" class="btn btn-dark my-3 col-1 d-inline-block" style="width: auto">Kembali</a>

        <form method="POST" action="/admin/mahasiswa/" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="namalengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('namalengkap') is-invalid @enderror" id="namalengkap"
                        name="namalengkap" value="{{ old('namalengkap') }}" required>
                    @error('namalengkap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
    <label for="tgl" class="form-label">Tanggal Lahir</label>
    <div class="row">
        {{-- Hari --}}
        <div class="col-md-4">
            <select class="form-select @error('tgl_hari') is-invalid @enderror" id="tgl_hari" name="tgl_hari" required>
                <option value="">Hari</option>
                @for ($i = 1; $i <= 31; $i++)
                    <option value="{{ $i }}" {{ old('tgl_hari') == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
            @error('tgl_hari')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Bulan --}}
        <div class="col-md-4">
            <select class="form-select @error('tgl_bulan') is-invalid @enderror" id="tgl_bulan" name="tgl_bulan" required>
                <option value="">Bulan</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ old('tgl_bulan') == $i ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                    </option>
                @endfor
            </select>
            @error('tgl_bulan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tahun --}}
        <div class="col-md-4">
            <select class="form-select @error('tgl_tahun') is-invalid @enderror" id="tgl_tahun" name="tgl_tahun" required>
                <option value="">Tahun</option>
                @for ($i = now()->year; $i >= 1900; $i--)
                    <option value="{{ $i }}" {{ old('tgl_tahun') == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
            @error('tgl_tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


                <div class="mb-2 mt-2">
    <label for="jeniskelamin" class="form-label"><strong>Jenis Kelamin</strong></label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input @error('jeniskelamin') is-invalid @enderror" type="radio"
            id="jeniskelamin_laki" name="jeniskelamin" value="Laki-laki"
            {{ old('jeniskelamin') == 'Laki-laki' ? 'checked' : '' }}>
        <label class="form-check-label" for="jeniskelamin_laki">Laki-laki</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input @error('jeniskelamin') is-invalid @enderror" type="radio"
            id="jeniskelamin_perempuan" name="jeniskelamin" value="Perempuan"
            {{ old('jeniskelamin') == 'Perempuan' ? 'checked' : '' }}>
        <label class="form-check-label" for="jeniskelamin_perempuan">Perempuan</label>
    </div>
    @error('jeniskelamin')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
                    @error('jeniskelamin')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                        name="nim" value="{{ old('nim') }}" required>
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="notelp" class="form-label">No Telepon</label>
                    <input type="text" class="form-control @error('notelp') is-invalid @enderror" id="notelp"
                        name="notelp" value="{{ old('notelp') }}" required>
                    @error('notelp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="prodi_id" class="form-label">Prodi</label>
                    <select class="form-select @error('prodi_id') is-invalid @enderror" id="prodi_id" name="prodi_id"
                        required>
                        <option value="">Pilih Prodi</option>
                        @foreach ($prodis as $prodi)
                            <option value="{{ $prodi->id }}" {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->namaprodi }}</option>
                        @endforeach
                    </select>
                    @error('prodi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jurusan_id" class="form-label">Jurusan</label>
                    <select class="form-select @error('jurusan_id') is-invalid @enderror" id="jurusan_id" name="jurusan_id"
                        required>
                        <option value="">Pilih Jurusan</option>
                        @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                                {{ $jurusan->namajurusan }}</option>
                        @endforeach
                    </select>
                    @error('jurusan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
@endsection
