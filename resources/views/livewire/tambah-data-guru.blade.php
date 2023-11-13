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
            <div class="grid-tengah w-100 overflow-auto">
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Master Guru |</span><span class="h2 text-biru"
                            style="padding-left: 10px;">Tambah Guru</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <form wire:submit.prevent="store" method="POST" action="{{ route('tambah-data-guru') }}">
                        <div class="card-body overflow-auto h-100 fs-5 m-0" id="shadow">
                            @csrf
                            <div class="row mb-3 align-items-center">
                                <div class="col-3">
                                    <span>NIP</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nip" type="text"
                                            class="form-control @error('nip') is-invalid @enderror"
                                            placeholder="Masukkan NIP" wire:model="nip" name="nip"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        @error('nip')
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
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama_guru" type="text"
                                            class="form-control @error('nama_guru') is-invalid @enderror"
                                            placeholder="Masukkan Nama Lengkap" wire:model="nama_guru" name="nama_guru"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                        @error('nama_guru')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                            <div class="row mb-3 align-items-center">
                                <div class="col-3">
                                    <span>Jenis Kelamin</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
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
                                    <span>Agama</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="agama" type="text"
                                            class="form-control @error('agama') is-invalid @enderror"
                                            placeholder="Masukkan Agama" wire:model="agama" name="agama"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
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
                                    <span>Nomor HP</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
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
                                    <span>Email</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
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
                                    <span>Provinsi</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="provinsi" type="text"
                                            class="form-control @error('provinsi') is-invalid @enderror"
                                            placeholder="Masukkan Provinsi" wire:model="provinsi" name="provinsi"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                        @error('provinsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-3">
                                    <span>Kota</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="kota" type="text"
                                            class="form-control @error('kota') is-invalid @enderror"
                                            placeholder="Masukkan Kota" wire:model="kota" name="kota"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                        @error('kota')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-3">
                                    <span>Desa</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="desa" type="text"
                                            class="form-control @error('desa') is-invalid @enderror"
                                            placeholder="Masukkan Desa" wire:model="desa" name="desa"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                        @error('desa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-3">
                                    <span>RT/RW</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="rt" type="text"
                                            class="form-control @error('rt') is-invalid @enderror"
                                            placeholder="Masukkan RT" wire:model="rt" name="rt"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        @error('rt')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="rw" type="text"
                                            class="form-control @error('rw') is-invalid @enderror"
                                            placeholder="Masukkan RW" wire:model="rw" name="rw"
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
                                <div class="col">
                                    <div class="input-group">
                                        <input id="alamat" type="text"
                                            class="form-control @error('alamat') is-invalid @enderror"
                                            placeholder="Masukkan Alamat Lengkap" wire:model="alamat" name="alamat">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row text-end" style="position: relative">
                                <div class="col">
                                    <input type="submit" value="Tambah" class="btn btn-primary mt-3">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
