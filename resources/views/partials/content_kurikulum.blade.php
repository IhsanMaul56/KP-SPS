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
            <div class="card-body" id="shadow">
                <div class="row mb-1" style="display: flex; align-items: center;">
                    <div class="col">
                        <input type="text" class="form-control" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 100px">
                    </div>
                    <div class="col-3" style="width: max-content;">
                        <span class="edit-data" id="shadow"><i class="bi bi-plus-lg" style="margin-right: 5px"></i>Tambah</span>
                    </div>
                </div>
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
            <div class="card-body" id="shadow">
                <div class="row mb-1" style="display: flex; align-items: center;">
                    <div class="col">
                        <input type="text" class="form-control" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 100px">
                    </div>
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
                <span class="h1 fw-bold text-biru">Akademik</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body" id="shadow">
                
            </div>
        </div>
    </div>
</div>

{{-- Page 5 --}}
<div class="col p-0 page" id="kurlum5">
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
                @livewire('akun-kurikulum')
            </div>
        </div>
    </div>
</div>