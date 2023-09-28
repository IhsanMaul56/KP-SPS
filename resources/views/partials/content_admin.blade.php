{{-- Page 1 --}}
<div class="col p-0 page active-page" id="admin1">
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
            @livewire('data-admin')
        </div>
    </div>
</div>

{{-- Page 2 --}}
<div class="col p-0 page" id="admin2">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Data Guru |</span><span class="h2 text-biru" style="padding-left: 10px;">Master Guru</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                <div class="row">
                    <div class="col">
                        @livewire('data-guru')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 3 --}}
<div class="col p-0 page" id="admin3">
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
            <div class="card-body h-100 overflow-auto" id="shadow">
                <div class="row">
                    <div class="col">
                        @livewire('data-siswa')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 4 --}}
<div class="col p-0 page" id="admin4">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Akademik |</span><span class="h2 text-biru" style="padding-left: 10px;">Jurusan</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                <div class="row">
                    <div class="col">
                    @livewire('data-jurusan')    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 5 --}}
<div class="col p-0 page" id="admin5">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Akademik |</span><span class="h2 text-biru" style="padding-left: 10px;">Kelas</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                <div class="row">
                    <div class="col">
                        @livewire('data-kelas')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 6 --}}
<div class="col p-0 page" id="admin6">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Akademik |</span><span class="h2 text-biru" style="padding-left: 10px">Jadwal Mapel</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 100px">
                    </div>
                </div>
                @livewire('data-jadwal')
            </div>
        </div>
    </div>
</div>

{{-- Page 7 --}}
<div class="col p-0 page" id="admin7">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Data Nilai</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                <div class="row">
                    <div class="col">
                        <div class="persegi">
                            <p class="text-white">Semester Admin</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="persegi2">
                            <p class="text-white">X RPL 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 8 --}}
<div class="col p-0 page" id="admin8">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Profil |</span><span class="h2 text-biru" style="padding-left: 10px">Data Diri</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                <div class="row">
                    <div class="col">
                        <div class="persegi">
                            <p class="text-white">Semester Admin</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="persegi2">
                            <p class="text-white">X RPL 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
