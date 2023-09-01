{{-- Page 1 --}}
<div class="col p-0 page active-page" id="page1">
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
                    @livewire('tabel-siswa')
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 2 --}}
<div class="col p-0 page" id="page2">
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
                @livewire('akun-siswa')
            </div>
        </div>
    </div>
</div>

{{-- Page 3 --}}
<div class="col p-0 page" id="page3">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Nilai</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body" id="shadow">
                <div class="row mb-2">
                    <p class="m-0 fs-5">Pilih Tahun Akademik:</p>
                </div>
                <div class="row mb-1" style="display: flex; align-items: center;">
                    <div class="col">
                        <select class="form-select" id="shadow" style="border-color: rgba(168, 168, 168, 1); width: 300px; border-radius: 100px">
                            <option selected>Semester Ganjil</option>
                            <option>Semester Genap</option>
                        </select>
                    </div>
                    <div class="col-3" style="width: max-content;">
                        <span class="cetak-rapor" onclick="pdf();" id="shadow"><i class="bi bi-printer" style="margin-right: 5px"></i>Cetak Rapor</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>