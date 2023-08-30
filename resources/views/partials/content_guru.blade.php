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
                        @livewire('table-guru')
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
                <span class="h1 fw-bold text-biru">Data Nilai</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body" id="shadow">
                <div class="row mb-2" style="width: 75%">
                    <div class="col">
                        <p class="m-0 fs-5">Mata Pelajaran</p>
                    </div>
                    <div class="col">
                        <p class="m-0 fs-5">Kelas</p>
                    </div>
                </div>
                <div class="row mb-1" style="display: flex; align-items: center; width: 75%;">
                    <div class="col">
                        <select class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 300px; border-radius: 100px">
                            <option selected>Bahasa Inggris</option>
                            <option>Bahasa Indonesia</option></option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 300px; border-radius: 100px">
                            <option selected>X RPL</option>
                            <option>XI Multimedia</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 3 --}}
<div class="col p-0 page" id="page3">
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
            <div class="card-body" id="shadow">
                <div class="row">
                    <div class="col">
                        <div class="persegi2 m-0">
                            <p class="text-white m-0 fs-5">X RPL 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>