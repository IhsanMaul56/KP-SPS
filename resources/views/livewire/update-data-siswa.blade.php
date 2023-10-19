@extends('layouts.app')

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
            <div class="grid-tengah">
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Data Siswa |</span><span class="h2 text-biru" style="padding-left: 10px;">Update Siswa</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="pagination-section">
                    <form wire:submit.prevent="update" method="POST" action="{{ route('update-data-siswa-post') }}">
                        @csrf
                        @if (Session::has('berhasil'))
                            <div class="alert alert-success">
                                {{ Session::get('berhasil') }}
                            </div>
                        @endif

                        @if (session('gagal'))
                            <div class="alert alert-danger">
                                {{ session('gagal') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="card p-0">
                            <div class="card-body overflow-auto h-100 fs-5">
                                {{-- @if($currentPage === 1) --}}
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>NIS</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan NIS" wire:model="nis" name="nis" value="{{ $siswa->nis }}">
                                            @error('nis')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nama Lengkap</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama_siswa" type="text" class="form-control @error('nama_siswa') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nama Lengkap" wire:model="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}">
                                            @error('nama_siswa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Tempat, Tanggal Lahir</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Tempat Lahir" wire:model="tempat_lahir" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}">
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
                                            <input wire:model="tanggal_lahir" type="date" id="datepicker" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Jenis Kelamin</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="radio" id="Laki-laki" value="Laki-laki" class="me-2" wire:model="jenis_kelamin" name="jenis_kelamin" @if($siswa->jenis_kelamin === 'Laki-laki') checked @endif>
                                            <label for="Laki-laki" class="me-3">Laki-laki</label>
                                            
                                            <input type="radio" id="Perempuan" value="Perempuan" class="me-2" wire:model="jenis_kelamin" name="jenis_kelamin" @if($siswa->jenis_kelamin === 'Perempuan') checked @endif>
                                            <label for="Perempuan" class="me-3">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Agama</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Agama" wire:model="agama" name="agama" value="{{ $siswa->agama }}">
                                            @error('agama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nomor HP</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nomor HP" oninput="this.value = this.value.replace(/[^0-9]/g, '')" wire:model="no_hp" name="no_hp" value="{{ $siswa->no_hp }}">
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nomor Email" wire:model="email" name="email" value="{{ $siswa->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Provinsi</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Provinsi" wire:model="provinsi" name="provinsi" value="{{ $siswa->provinsi }}">
                                            @error('provinsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Kota</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Kota" wire:model="kota" name="kota" value="{{ $siswa->kota }}">
                                            @error('kota')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Desa</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="desa" type="text" class="form-control @error('desa') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Desa" wire:model="desa" name="desa" value="{{ $siswa->desa }}">
                                            @error('desa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>RT/RW</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="rt" type="text" class="form-control @error('rt') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RT" wire:model="rt" name="rt" value="{{ $siswa->rt }}">
                                            @error('rt')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="rw" type="text" class="form-control @error('rw') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RW" wire:model="rw" name="rw" value="{{ $siswa->rw }}">
                                            @error('rw')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row lg-2" >
                                    <div class="col-3">
                                        <span>Alamat Lengkap</span>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Alamat Lengkap" wire:model="alamat" name="alamat" value="{{ $siswa->alamat }}">
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 mt-5">
                                        
                                    </div>
                                </div>
                                
                                {{-- <button wire:click="submitFormPart1">Selanjutnya</button>
                                @else --}}
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>NIK Ayah</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nik_ayah" type="text" class="form-control @error('nik_ayah') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan NIK Ayah" wire:model="nik_ayah" name="nik_ayah" value="{{ $siswa->nik_ayah }}">
                                            @error('nik_ayah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nama Ayah</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nama Ayah" wire:model="nama_ayah" name="nama_ayah" value="{{ $siswa->nama_ayah }}">
                                            @error('nama_ayah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Pekerjaan Ayah</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="pekerjaan_ayah" type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Pekerjaan Ayah" wire:model="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ $siswa->pekerjaan_ayah }}">
                                            @error('pekerjaan_ayah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>NIK Ibu</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nik_ibu" type="text" class="form-control @error('nik_ibu') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan NIK Ibu" wire:model="nik_ibu" name="nik_ibu" value="{{ $siswa->nik_ibu }}">
                                            @error('nik_ibu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nama Ibu</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nama Ibu" wire:model="nama_ibu" name="nama_ibu" value="{{ $siswa->nama_ibu }}">
                                            @error('nama_ibu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Pekerjaan Ibu</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="pekerjaan_ibu" type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Pekerjaan Ibu" wire:model="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ $siswa->pekerjaan_ibu }}">
                                            @error('pekerjaan_ibu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Provinsi Orang Tua</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="provinsi_ortu" type="text" class="form-control @error('provinsi_ortu') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Provinsi Orang Tua" wire:model="provinsi_ortu" name="provinsi_ortu" value="{{ $siswa->provinsi_ortu }}">
                                            @error('provinsi_ortu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Kota Orang Tua</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="kota_ortu" type="text" class="form-control @error('kota_ortu') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Kota Orang Tua" wire:model="kota_ortu" name="kota_ortu" value="{{ $siswa->kota_ortu }}">
                                            @error('kota_ortu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Desa</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="desa_ortu" type="text" class="form-control @error('desa_ortu') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Desa Orang Tua" wire:model="desa_ortu" name="desa_ortu" value="{{ $siswa->desa_ortu }}">
                                            @error('desa_ortu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>RT/RW</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="rt_ortu" type="text" class="form-control @error('rt_ortu') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RT Orang Tua" wire:model="rt_ortu" name="rt_ortu" value="{{ $siswa->rt_ortu }}">
                                            @error('rt_ortu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="rw_ortu" type="text" class="form-control @error('rw_ortu') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RW Orang Tua" wire:model="rw_ortu" name="rw_ortu" value="{{ $siswa->rw_ortu }}">
                                            @error('rw_ortu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row lg-2" >
                                    <div class="col-3">
                                        <span>Alamat Lengkap</span>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input id="alamat_ortu" type="text" class="form-control @error('alamat_ortu') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Alamat Lengkap" wire:model="alamat_ortu" name="alamat_ortu" value="{{ $siswa->alamat_ortu }}">
                                            @error('alamat_ortu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 mt-5">
                                        
                                    </div>
                                </div>
                                {{-- <button wire:click="submitFormPart2">Sebelumnya</button>                        --}}
                                <input type="submit" value="Simpan" class="btn btn-primary mt-5">
                                {{-- @endif --}}
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </div>

    <div class="col p-0">
        <div class="grid-kanan">
            @include('partials.rightbar_admin')
        </div>
    </div>
</div>
@endsection