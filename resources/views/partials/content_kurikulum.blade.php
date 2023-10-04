{{-- Beranda Kurikulum --}}
<div class="col p-0 page active-page" id="BerandaKurikulum">
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

{{-- Data Guru | Guru Wali Kurikulum --}}
<div class="col p-0 page" id="GuruWaliKurikulum">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Data Guru |</span><span class="h2 text-biru" style="padding-left: 10px;">Guru Wali</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body overflow-auto h-100" id="shadow">
                @livewire('data-guru-wali')
            </div>
        </div>
    </div>
</div>

{{-- Data Guru | Guru Mapel Kurikulum --}}
<div class="col p-0 page" id="GuruMapelKurikulum">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Data Guru |</span><span class="h2 text-biru" style="padding-left: 10px;">Guru Mapel</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body overflow-auto h-100" id="shadow">
                @livewire('data-guru-mapel')
            </div>
        </div>
    </div>
</div>

{{-- Data Guru | Master Guru Kurikulum --}}
<div class="col p-0 page" id="MasterGuruKurikulum">
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
            <div class="card-body overflow-auto h-100" id="shadow">
                @livewire('data-guru')
            </div>
        </div>
    </div>
</div>

{{-- Data Siswa Kurikulum --}}
<div class="col p-0 page" id="DataSiswaKurikulum">
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

{{-- Akademik | Jadwal Mapel Kurikulum --}}
<div class="col p-0 page" id="JadwalMapelKurikulum">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Akademik |</span><span class="h2 text-biru" style="padding-left: 10px;">Jadwal Mapel</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                @livewire('data-jadwal')
            </div>
        </div>
    </div>
</div>

{{-- Akademik | Jurusan Kurikulum --}}
<div class="col p-0 page" id="JurusanKurikulum">
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
            <div class="card-body h-100 overflow-auto" id="shadow" style="height: 575px">
                @livewire('data-jurusan')
            </div>
        </div>
    </div>
</div>

{{-- Akademik | Kelas Kurikulum --}}
<div class="col p-0 page" id="KelasKurikulum">
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
            <div class="card-body h-100 overflow-auto" id="shadow" style="height: 575px">
                @livewire('data-kelas')
            </div>
        </div>
    </div>
</div>

{{-- Profil Kurikulum --}}
<div class="col p-0 page" id="ProfilKurikulum">
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
            <div class="card-body h-100 overflow-auto" id="shadow" style="height: 575px">
                @livewire('akun-guru')
            </div>
        </div>
    </div>
</div>
