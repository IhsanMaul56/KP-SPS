<div class="row m-0">
    <div class="grid-kiri p-0 text-center">
            <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid" alt="logo smk" height="90" width="90" style="margin-top: 30px; margin-bottom: 20px;">
            <br><h5 class="text-white fw-bold m-0">SMK SANGKURIANG <br> 1 CIMAHI</h5>
        <div class="col" style="margin-top: 50px;">
            @if (Auth::user()->role == 'admin')
                    <span class="btn btn-primary"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                    <span class="btn btn-primary">Admin</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
            @elseif (Auth::user()->role == 'kurikulum')
                    <span class="btn btn-primary"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                    <span class="btn btn-primary">Kurikulum</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
            @elseif (Auth::user()->role == 'guru')
            <div class="row mx-0">
                <span class="sidebar active"><i class="bi bi-house-door" style="margin-right: 15px; font-size: 30px;"></i>Beranda</span><br>
            </div>
            <div class="row mx-0">
                <span class="sidebar"><i class="bi bi-person-circle" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Data Siswa</span><br>
            </div>
            <div class="row mx-0">
                <span class="sidebar"><i class="bi bi-clipboard-minus" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Data Kelas</span><br>
            </div>
            @elseif (Auth::user()->role == 'siswa')
                <div class="row mx-0">
                    <span class="sidebar active"><i class="bi bi-house-door" style="padding-right: 15px; font-size: 30px;"></i>Beranda</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar"><i class="bi bi-person-circle" style="padding-right: 15px; font-size: 30px;"></i>Akun</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar"><i class="bi bi-clipboard-minus" style="padding-right: 15px; font-size: 30px;"></i>Nilai</span><br>
                </div>
            @endif
        </div>
        <div class="row mx-0">
            <a href="/logout" class="exit" style="text-decoration: none;"><i class="bi bi-box-arrow-right" style="font-size: 30px; padding-right: 15px;"></i>Keluar</a>
        </div>
    </div>
