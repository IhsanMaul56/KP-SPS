{{-- Beranda Guru --}}
<div class="col p-0 page active-page" id="BerandaGuru">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Beranda</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                <div class="row">
                        @livewire('table-guru')
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Data Nilai Guru --}}
<div class="col p-0 page" id="DataNilaiGuru">
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
            @livewire('data-nilai-guru')
        </div>
    </div>
</div>

{{-- Data Kelas Guru --}}
<div class="col p-0 page" id="DataKelasGuru">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Data Kelas</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body" id="shadow" style="height: max-content">
                <div class="row">
                    @livewire('guru-wali')
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Profil Guru --}}
<div class="col p-0 page" id="ProfilGuru">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Profil |</span><span class="h2 text-biru" style="padding-left: 10px;">Data Diri</span>
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