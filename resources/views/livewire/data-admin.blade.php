<div class="row d-flex justify-content-between">
    <div class="col-auto">
        <div class="container" id="shadow">
            <i class="bi bi-person" style="color: #16498c; font-size: 50px; text-align: center;"></i>
            <span class="text">Admin</span>
            <span class="num" data-val="{{ $countAdmin }}"></span>
        </div>
    </div>
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
        <div class="container" id="shadow">
            <i class="bi bi-person" style="color: #16498c; font-size: 50px; text-align: center;"></i>
            <span class="text">Kurikulum</span>
            <span class="num" data-val="{{ $countKurikulum }}"></span>
        </div>
    </div>
</div>
