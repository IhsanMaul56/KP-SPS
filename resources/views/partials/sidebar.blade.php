<div class="row m-0">
    <div class="grid-kiri p-0 text-center">
            <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mt-4 mb-4" alt="logo smk" height="120" width="120">
            <br><h4 class="text-white mb-2 fw-bold">SMK SANGKURIANG <br> 1 CIMAHI</h4>
        <div class="col">
            @if (Auth::user()->role == 'admin')
                <div class="row ms-5">
                    <span class="sidebar active my-3 fs-4" id="btnPage1"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage2"><i class="bi bi-person-lines-fill fs-4 me-2"></i>Data Guru</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage3"><i class="bi bi-person-lines-fill fs-4 me-2"></i>Data Siswa</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage4"><i class="bi bi-house fs-4 me-2"></i>Akademik</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage5"><i class="bi bi-house fs-4 me-2"></i>Data Nilai</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage6"><i class="bi bi-house fs-4 me-2"></i>Akun</span><br>
                </div>
            @elseif (Auth::user()->role == 'kurikulum')
                <div class="row ms-5">
                    <span class="sidebar active my-3 fs-4" id="btnPage1"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage2"><i class="bi bi-house fs-4 me-2"></i>Data Guru</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage3"><i class="bi bi-house fs-4 me-2"></i>Data Siswa</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage4"><i class="bi bi-house fs-4 me-2"></i>Akademik</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage5"><i class="bi bi-house fs-4 me-2"></i>Akun</span><br>
                </div>
            @elseif (Auth::user()->role == 'guru')
                <div class="row ms-5">
                    <span class="sidebar active my-3 fs-4" id="btnPage1"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage2"><i class="bi bi-house fs-4 me-2"></i>Siswa</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage3"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
            @elseif (Auth::user()->role == 'siswa')
                <div class="row ms-5">
                    <span class="sidebar active my-3 fs-4" id="btnPage1"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage2"><i class="bi bi-house fs-4 me-2"></i>Akun</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-3 fs-4 mt-auto" id="btnPage3"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
            @endif
            <div class="row mx-0">
                <a href="/logout" class="exit" style="text-decoration: none;"><i class="bi bi-box-arrow-right" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Keluar</a>
            </div>
        </div>
    </div>
