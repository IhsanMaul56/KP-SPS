@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <div class="container-fluid p-0">
        @include('partials.sidebar')
        <div class="col p-0">
            <div class="grid-tengah w-100 overflow-auto">
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Master Siswa |</span><span class="h2 text-biru"
                            style="padding-left: 10px;">Tambah Siswa</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <form wire:submit.prevent="store" method="POST" action="{{ route('tambah-data-siswa-store') }}">
                        @if (session()->has('gagal'))
                            <div class="alert alert-danger">
                                {{ session('gagal') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="card-body overflow-auto fs-5 m-0" id="shadow" style="height: max-content">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>NIS</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="nis" type="text"
                                                            class="form-control @error('nis') is-invalid @enderror"
                                                            placeholder="Masukkan NIS" wire:model="nis" name="nis"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                        @error('nis')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Nama Lengkap</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="nama_siswa" type="text"
                                                            class="form-control @error('nama_siswa') is-invalid @enderror"
                                                            placeholder="Masukkan Nama Lengkap" wire:model="nama_siswa"
                                                            name="nama_siswa"
                                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                                        @error('nama_siswa')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Agama</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <select name="agama" wire:model="agama" class="form-select @error('agama') is-invalid @enderror">
                                                            <option value="" selected>Pilih Agama</option>
                                                            <option value="islam">Islam</option>
                                                            <option value="kristen">Kristen</option>
                                                            <option value="hindu">Hindu</option>
                                                            <option value="buddha">Buddha</option>
                                                            <option value="konghucu">Konghucu</option>
                                                        </select>
                                                        @error('agama')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Email</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="Masukkan Email" wire:model="email" name="email">
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Nomor HP</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="no_hp" type="text"
                                                            class="form-control @error('no_hp') is-invalid @enderror"
                                                            placeholder="Masukkan Nomor HP"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" wire:model="no_hp"
                                                            name="no_hp">
                                                        @error('no_hp')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Jenis Kelamin</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="radio" id="Laki-lai" value="Laki-laki" class="me-2"
                                                            wire:model="jenis_kelamin" name="jenis_kelamin">
                                                        <label for="Laki-laki" class="me-3">Laki-laki</label>
                                                        <input type="radio" id="Perempuan" value="Perempuan" class="me-2"
                                                            wire:model="jenis_kelamin" name="jenis_kelamin">
                                                        <label for="Perempuan" class="me-3">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Tempat, Tanggal Lahir</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group">
                                                        <input id="tempat_lahir" type="text"
                                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                            placeholder="Masukkan Tempat Lahir" wire:model="tempat_lahir"
                                                            name="tempat_lahir"
                                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                                        @error('tempat_lahir')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group">
                                                        <label for="datepicker"></label>
                                                        <input wire:model="tanggal_lahir" type="date" id="datepicker"
                                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                            name="tanggal_lahir">
                                                        @error('tanggal_lahir')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row align-items-center">
                                                <livewire:wilayah />
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>RT/RW</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="input-group">
                                                        <input id="rt" type="text"
                                                            class="form-control @error('rt') is-invalid @enderror"
                                                            placeholder="RT" wire:model="rt" name="rt"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                        @error('rt')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="input-group">
                                                        <input id="rw" type="text"
                                                            class="form-control @error('rw') is-invalid @enderror"
                                                            placeholder="RW" wire:model="rw" name="rw"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                        @error('rw')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-3">
                                                    <span>Alamat Lengkap</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="alamat" type="text"
                                                            class="form-control @error('alamat') is-invalid @enderror"
                                                            placeholder="Masukkan Alamat Lengkap" wire:model="alamat"
                                                            name="alamat">
                                                        @error('alamat')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <div class="card-body overflow-auto fs-5 m-0" id="shadow" style="height: max-content">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>NIK Ayah</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="nik_ayah" type="text"
                                                            class="form-control @error('nik_ayah') is-invalid @enderror"
                                                            placeholder="Masukkan NIK Ayah" wire:model="nik_ayah" name="nik_ayah"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                        @error('nik_ayah')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Nama Ayah</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="nama_ayah" type="text"
                                                            class="form-control @error('nama_ayah') is-invalid @enderror"
                                                            placeholder="Masukkan Nama Ayah" wire:model="nama_ayah"
                                                            name="nama_ayah"
                                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                                        @error('nama_ayah')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Pekerjaan Ayah</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="pekerjaan_ayah" type="text"
                                                            class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                                            placeholder="Masukkan Pekerjaan Ayah" wire:model="pekerjaan_ayah"
                                                            name="pekerjaan_ayah"
                                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                                        @error('pekerjaan_ayah')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>NIK Ibu</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="nik_ibu" type="text"
                                                            class="form-control @error('nik_ibu') is-invalid @enderror"
                                                            placeholder="Masukkan NIK Ibu" wire:model="nik_ibu" name="nik_ibu"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                        @error('nik_ibu')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Nama Ibu</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="nama_ibu" type="text"
                                                            class="form-control @error('nama_ibu') is-invalid @enderror"
                                                            placeholder="Masukkan Nama Ibu" wire:model="nama_ibu" name="nama_ibu"
                                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                                        @error('nama_ibu')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>Pekerjaan Ibu</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="pekerjaan_ibu" type="text"
                                                            class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                                            placeholder="Masukkan Pekerjaan Ibu" wire:model="pekerjaan_ibu"
                                                            name="pekerjaan_ibu"
                                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                                        @error('pekerjaan_ibu')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row align-items-center">
                                                <livewire:wilayah-ortu />
                                            </div>
                                            <div class="row mb-3 align-items-center">
                                                <div class="col-3">
                                                    <span>RT/RW</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="input-group">
                                                        <input id="rt_ortu" type="text"
                                                            class="form-control @error('rt_ortu') is-invalid @enderror"
                                                            placeholder="RT" wire:model="rt_ortu" name="rt_ortu"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                        @error('rt_ortu')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="input-group">
                                                        <input id="rw_ortu" type="text"
                                                            class="form-control @error('rw_ortu') is-invalid @enderror"
                                                            placeholder="RW" wire:model="rw_ortu" name="rw_ortu"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                        @error('rw_ortu')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-3">
                                                    <span>Alamat Lengakp</span>
                                                </div>
                                                <div class="col-auto">
                                                    <span>:</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input id="alamat_ortu" type="text"
                                                            class="form-control @error('alamat_ortu') is-invalid @enderror"
                                                            placeholder="Masukkan Alamat Lengkap" wire:model="alamat_ortu"
                                                            name="alamat_ortu">
                                                        @error('alamat_ortu')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card-body overflow-auto fs-5 mt-3" id="shadow"
                                    style="height: max-content">
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <span>Kelas</span>
                                        </div>
                                        <div class="col-auto">
                                            <select wire:model="tingkat_id" class="form-select"
                                                style="width: 175px;"
                                                name="tingkat_id">
                                                <option value="" hidden selected>Pilih Tingkat</option>
                                                @foreach ($tingkatList as $kodeTingkat => $namaTingkat)
                                                    <option value="{{ $kodeTingkat }}">{{ $namaTingkat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <select wire:model="kelas_id" class="form-select"
                                                style="width: 175px;"
                                                name="kelas_id">
                                                <option value="" hidden selected>Pilih Kelas</option>
                                                @foreach ($kelasList as $kodeKelas => $namaKelas)
                                                    <option value="{{ $kodeKelas }}">{{ $namaKelas }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col text-end" style="position: relative">
                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
