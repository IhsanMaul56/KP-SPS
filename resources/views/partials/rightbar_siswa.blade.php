{{-- pengumuman --}}
<div class="rightbar active-page" id="rightbar1">
    <div class="row mb-3">
        <div class="col fs-2 justify-content-end d-flex align-items-center">
            <i class="bi bi-person-circle"></i>
            <span class="fs-5 fw-bold ms-2" style="cursor: pointer" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->siswa_id }}</span>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#" id="btnPage6">Profil</a></li>
                <li><a class="dropdown-item" href="/logout">Keluar</a></li>
            </ul>
        </div>
    </div>
    <div class="row p-0 m-0">
        <div class="card-body overflow-auto" id="shadow">
            <div class="row">
                <div class="col">
                    <i class="bi bi-megaphone-fill"><span style="padding-left: 10px;"></span></i>Pengumuman
                    <hr>
                </div>
                <div class="row m-0 p-0">
                    <img src="{{URL::asset('/img/no-data.png')}}" alt="clipboard" width="150px"><br>
                    <span class="fs-5" style="text-align: center; color: grey;">Tidak Ada Pengumuman Saat Ini</span>
                </div>
            </div>
        </div>
    </div>
</div>

