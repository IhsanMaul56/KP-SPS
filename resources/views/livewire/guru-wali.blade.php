<div class="card-body h-100 overflow-auto" id="shadow">
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
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" wire:model="search" placeholder="Cari" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 10px 10px 10px 10px;">
            </div>
            <table class="table m-3 table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        <th>JENIS KELAMIN</th>
                        <th>NILAI</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td>112233</td>
                        <td class="text-start">Akung</td>
                        <td>Laki-laki</td>
                        <td>75</td>
                        <td class="text-start">Kurang rajin</td>
                        <td><button class="btn btn-success" id="shadow" type="submit" style="position: relative;"><i class="bi bi-eye"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col text-end mt-3">
            <button class="btn btn-success" id="shadow" type="submit" style="position: relative;">Setujui</button>
        </div>
    @else
        <div class="col text-center">
            <img src="{{ URL::asset('/img/warning.png') }}" alt="warning" width="125px;">
        </div>
        <div class="col text-center pt-3">
            <span class="mt-3">Halaman Belum Bisa Diakses</span>
        </div>
    </div>
    @endif
</div>
</div>
