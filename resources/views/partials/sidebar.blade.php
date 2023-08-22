<div class="row m-0">
    <div class="grid-kiri p-0 text-center">
    <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid" alt="logo smk" height="120" width="120" style="margin-top: 20px; margin-bottom: 10px;">
            <br><h5 class="text-white fw-bold" style="margin-bottom: 0px;">SMK SANGKURIANG <br> 1 CIMAHI</h5>
        <div class="col" style="margin-top: 40px">
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
            <a href="/logout" class="exit" style="text-decoration: none;" id="shadow"><i class="bi bi-box-arrow-right" style="font-size: 30px; padding-right: 15px;"></i>Keluar</a>
        </div>
    </div>
