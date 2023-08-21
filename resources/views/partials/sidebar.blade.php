<div class="row m-0">
    <div class="grid-kiri p-0 text-center">
    <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mt-4 mb-4" alt="logo smk" height="120" width="120">
            <br><h5 class="text-white mb-2 fw-bold">SMK SANGKURIANG <br> 1 CIMAHI</h5>
        <div class="col mt-5">
            @if (Auth::user()->role == 'admin')
                <div class="row mx-0">
                    <span class="sidebar active" id="btnPage1"><i class="bi bi-house-door icon-kiri"></i>Beranda</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage2"><i class="bi bi-person-vcard icon-kiri"></i>Data Guru</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage3"><i class="bi bi-person-lines-fill icon-kiri"></i>Data Siswa</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage4"><i class="bi bi-clipboard2-minus icon-kiri"></i>Akademik</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage5"><i class="bi bi-clipboard2-data icon-kiri"></i>Data Nilai</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage6"><i class="bi bi-person-circle icon-kiri"></i>Akun</span><br>
                </div>

            @elseif (Auth::user()->role == 'kurikulum')
                <div class="row mx-0">
                    <span class="sidebar active" id="btnPage1"><i class="bi bi-house-door icon-kiri"></i>Beranda</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage2"><i class="bi bi-person-vcard icon-kiri"></i>Data Guru</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage3"><i class="bi bi-person-lines-fill icon-kiri"></i>Data Siswa</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage4"><i class="bi bi-clipboard2-minus icon-kiri"></i>Akademik</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage5"><i class="bi bi-person-circle icon-kiri"></i>Akun</span><br>
                </div>

            @elseif (Auth::user()->role == 'guru')
                <div class="row mx-0">
                    <span class="sidebar active" id="btnPage1"><i class="bi bi-house-door icon-kiri"></i>Beranda</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage2"><i class="bi bi-journal-text icon-kiri"></i>Data Mata Pelajaran</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage2"><i class="bi bi-journal-richtext icon-kiri"></i>Data Kelas</span><br>
                </div>

            @elseif (Auth::user()->role == 'siswa')
                <div class="row mx-0">
                    <span class="sidebar active" id="btnPage1"><i class="bi bi-house-door icon-kiri"></i>Beranda</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage2"><i class="bi bi-person-circle icon-kiri"></i>Akun</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnPage3"><i class="bi bi-clipboard-minus icon-kiri"></i>Nilai</span><br>
                </div>
            @endif
        </div>
        <div class="row mx-0">
            <a href="/logout" class="exit" style="text-decoration: none;"><i class="bi bi-box-arrow-right" style="font-size: 30px; padding-right: 15px;"></i>Keluar</a>
        </div>
    </div>
