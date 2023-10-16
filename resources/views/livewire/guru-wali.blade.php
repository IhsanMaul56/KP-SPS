<div class="card-body h-100 overflow-auto">
    <div class="row">
        <div class="col">
            @if ($dataSiswa != null)
                <div class="row mb-3">
                    <div class="col-3" style="width: 200px">
                        <div class="persegi">
                            <p class="text-white m-0 fs-5 px-3">2022/2023 Ganjil</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="persegi2 m-0 px-3">
                            <p class="text-white m-0 fs-5">{{ $tingkat }} {{ $kelas }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control" wire:model="search" placeholder="Cari" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 10px 10px 10px 10px;">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($dataSiswa as $item)
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col text-end mt-3">
                <button class="btn btn-success" id="shadow" type="submit" style="position: relative;">Setujui</button>
            </div>
        @else
            <div class="col text-center">
                <img src="{{URL::asset('/img/warning.png')}}" alt="warning" width="125px;">
            </div>
            <div class="col text-center pt-3">
                <span class="mt-3">Halaman Belum Bisa Diakses</span>
            </div>
        @endif
    </div>
</div>