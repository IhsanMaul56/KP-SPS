{{-- Page 1 --}}
<div class="col p-0 page active-page" id="page11">
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
            <div class="card-body" id="shadow">
                <div class="row">
                    <div class="col">
                        <div class="persegi">
                            <p class="text-white m-0 fs-5">Semester Guru</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="persegi2">
                            <p class="text-white m-0 fs-5">X RPL 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 2 --}}
<div class="col p-0 page" id="page22">
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
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 25%; border-color: black;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 3 --}}
<div class="col p-0 page" id="page33">
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
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 25%; border-color: black;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 4 --}}
<div class="col p-0 page" id="page4">
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
                <div class="row">
                    <div class="col">
                        <div class="persegi">
                            <p class="text-white">Semester Guru</p>
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

{{-- Page 5 --}}
<div class="col p-0 page" id="page5">
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
            <div class="card-body" id="shadow">
                <div class="row">
                    <div class="col">
                        <div class="persegi">
                            <p class="text-white">Semester Guru</p>
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