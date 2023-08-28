<div class="row mb-3">
    <div class="col fs-2 justify-content-end d-flex align-items-center">
        <i class="bi bi-person-circle"></i>
        <span class="fs-5 fw-bold ms-2" style="cursor: pointer" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->id }}</span>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#" id="btnPage6">Profil</a></li>
            <li><a class="dropdown-item" href="/logout">Keluar</a></li>
        </ul>
    </div>
</div>
<div class="row p-0 m-0 mt-3">
    <div class="card-body" id="shadow">
        <div class="row">
            <div class="col">
                <p><i class="bi bi-megaphone-fill"><u style="padding-left: 10px;">Pengumuman</u></i></p>
            </div>
            <div class="row m-0 p-0 text-center">
                <img src="{{URL::asset('/img/no-data.png')}}" alt="clipboard" width="150px"><br>
                <span>Tidak Ada Pengumuman Saat Ini</span>
            </div>
        </div>
    </div>
</div>