{{-- Page 1 --}}
<div class="col p-0 page active-page" id="kurlum1">
    <div class="grid-tengah">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col">
                <span class="h1 fw-bold text-biru">Beranda</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0" style="display: flex; justify-content: space-between;">
            @livewire('data-kurikulum')
        </div>
    </div>
</div>

{{-- Page 2 --}}
<div class="col p-0 page" id="kurlum2">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Data Guru</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body overflow-auto h-100" id="shadow">
                @livewire('data-guru')
            </div>
        </div>
    </div>
</div>

{{-- Page 3 --}}
<div class="col p-0 page" id="kurlum3">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Data Siswa</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body overflow-auto h-100" id="shadow">
                <div class="row mb-1" style="display: flex; align-items: center;">
                    @livewire('data-siswa')
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 4 --}}
<div class="col p-0 page" id="kurlum4">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Akademik | Jadwal Pelajaran</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body" id="shadow">
                <div class="row mb-1" style="display: flex; align-items: center;">
                    <div class="col">
                        <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1);">
                    </div>
                    <div class="col-3" style="width: max-content;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertData">
                            <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                        </button>
                    </div>
                </div>
                {{-- @livewire('data-jadwal') --}}
            </div>
        </div>
    </div>
</div>

{{-- Page 5 --}}
<div class="col p-0 page" id="kurlum5">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Akademik | Data Jurusan</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow" style="height: 575px">
                @livewire('data-jurusan')
            </div>
        </div>
    </div>
</div>

{{-- Page 6 --}}
<div class="col p-0 page" id="kurlum6">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Akademik | Data Kelas</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow" style="height: 575px">
                @livewire('data-kelas')
            </div>
        </div>
    </div>
</div>

{{-- Page 7 --}}
<div class="col p-0 page" id="kurlum7">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Akun</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow" style="height: 575px">
                @livewire('akun-guru')
            </div>
        </div>
    </div>
</div>
