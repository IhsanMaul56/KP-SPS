<div class="row d-flex justify-content-between">
    <div class="col-auto">
        <a href="{{ route('master-guru') }}" style="text-decoration: none">
        <div class="container" id="shadow">
                <i class="bi bi-person" style="color: #16498c; font-size: 50px; text-align: center;"></i>
                <span class="text">Guru</span>
                <span class="num" data-val="{{ $countGuru }}"></span>
            </div>
        </a>
    </div>
    <div class="col-auto">
        <a href="{{ route('siswa-kurikulum') }}" style="text-decoration: none">
            <div class="container" id="shadow">
                <i class="bi bi-person" style="color: #16498c; font-size: 50px; text-align: center;"></i>
                <span class="text">Siswa</span>
                <span class="num" data-val="{{ $countSiswa }}"></span>
            </div>
        </a>
    </div>
    <div class="col-auto">
        <a href="{{ route('m-jurusan') }}" style="text-decoration: none">
            <div class="container" id="shadow">
                <i class="bi bi-person" style="color: #16498c; font-size: 50px; text-align: center;"></i>
                <span class="text">Jurusan</span>
                <span class="num" data-val="{{ $countJurusan }}"></span>
            </div>
        </a>
    </div>
    <div class="col-auto">
        <a href="{{ route('m-kelas') }}" style="text-decoration: none">
            <div class="container" id="shadow">
                <i class="bi bi-person" style="color: #16498c; font-size: 50px; text-align: center;"></i>
                <span class="text">Kelas</span>
                <span class="num" data-val="{{ $countKelas }}"></span>
            </div>
        </a>
    </div>
</div>
