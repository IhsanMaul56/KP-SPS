{{-- Beranda Admin --}}
<div class="col p-0 page active-page" id="BerandaAdmin">
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

{{-- Data Guru | Guru Wali Admin --}}
<div class="col p-0 page" id="GuruWaliAdmin">
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
            <div class="card-body h-100 overflow-auto" id="shadow">
                @livewire('data-guru-wali')
            </div>
        </div>
    </div>
</div>

{{-- Data Guru | Guru Mapel Admin --}}
<div class="col p-0 page" id="GuruMapelAdmin">
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
            <div class="card-body h-100 overflow-auto" id="shadow">
                @livewire('data-guru-mapel')
            </div>
        </div>
    </div>
</div>

{{-- Data Guru | Master Guru Admin --}}
<div class="col p-0 page" id="MasterGuruAdmin">
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

{{-- Data Siswa Admin --}}
<div class="col p-0 page" id="DataSiswaAdmin">
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

{{-- Akademik | Jadwal Mapel Admin --}}
<div class="col p-0 page" id="JadwalMapelAdmin">
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
                <div class="row">
                    <div class="col">
                    @livewire('data-jadwal')    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Akademik | Jurusan Admin --}}
<div class="col p-0 page" id="JurusanAdmin">
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

{{-- Akademik | Kelas Admin --}}
<div class="col p-0 page" id="KelasAdmin">
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

{{-- Data Nilai | Nilai Mapel --}}
<div class="col p-0 page" id="NilaiMapelAdmin">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Data Nilai |</span><span class="h2 text-biru" style="padding-left: 10px">Nilai Mapel</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                
            </div>
        </div>
    </div>
</div>

{{-- Data Nilai | Rapor --}}
<div class="col p-0 page" id="RaporAdmin">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Data Nilai |</span><span class="h2 text-biru" style="padding-left: 10px">Rapor</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                
            </div>
        </div>
    </div>
</div>

{{-- Profil Admin --}}
<div class="col p-0 page" id="ProfilAdmin">
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
                
            </div>
        </div>
    </div>
</div>
