{{-- Beranda Siswa --}}
<div class="col p-0 page active-page" id="BerandaSiswa">
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
            <div class="card-body overflow-auto" id="shadow">
                <div class="row">
                    @livewire('tabel-siswa')
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Nilai Siswa --}}
<div class="col p-0 page" id="NilaiSiswa">
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
                        <select class="form-select" id="shadow" style="border-color: rgba(168, 168, 168, 1); width: max-content; border-radius: 10px 10px 10px 10px">
                            <option selected>2023/2024 Semester Ganjil</option>
                            <option>2024/2025 Semester Genap</option>
                        </select>
                    </div>
                </div>
                <table class="table table-bordered my-3">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai Akhir</th>
                            <th>Huruf</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr class="text-center">
                                <td>1</td>
                                <td class="text-start">BAHASA INGGRIS</td>
                                <td>75</td>
                                <td>A</td>
                                <td>
                                    <span class="btn btn-success"><i class="bi bi-eye"></i></span>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Profil Siswa --}}
<div class="col p-0 page" id="ProfilSiswa">
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
                @livewire('akun-siswa')
            </div>
        </div>
    </div>
</div>