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
<div class="row p-0 m-0">
    <div class="card-body h-100 overflow-auto" id="shadow">
        <div class="row m-0 p-0">
            <i class="bi bi-person-circle" style="text-align: center; font-size: 100px;"></i>
        </div>
        <div class="row">
            <span class="fw-bold mb-2" style="text-align: center; font-size: 20px;">{{ Auth::user()->name }}</span>
            <span class="fw-bold" style="text-align: center; font-size: 20px;">{{ Auth::user()->email }}</span>
        </div>
        <div class="row justify-content-center" style="margin-top: 115px;">
            <span class="simpan-data fw-bold" id="shadow">Simpan Data</span>
        </div>
    </div>
</div>