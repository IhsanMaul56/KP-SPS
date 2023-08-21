<div class="row">
    <div class="col text-end fs-2">
        <span class="fs-5 fw-bold">{{ Auth::user()->id }}</span>
        <i class="bi bi-person-circle"></i>
    </div>
</div>
<div class="row p-0 m-0">
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