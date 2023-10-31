<div class="card-body h-100 overflow-auto" id="shadow">
    <div class="col">
        @if ($dataSiswa != null)
            <div class="row mb-3">
                <div class="col-auto">
                    <div class="persegi">
                        <p class="text-white m-0 fs-5 px-3">2022/2023</p>
                    </div>
                </div>
                <div class="col">
                    <div class="persegi2 m-0 px-3">
                        <p class="text-white m-0 fs-5">{{ $tingkat }} {{ $kelas }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="border-color: rgba(168, 168, 168, 1); width: max-content; border-radius: 10px 10px 10px 10px;">
                </div>
            </div>
            <table class="table table-bordered">
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
                    <?php $no = 1; ?>
                    @foreach ($dataSiswa as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nis }}</td>
                            <td class="text-start">{{ $item->nama_siswa }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>0</td>
                            <td class="text-start">Baba</td>
                            <td>Aksi</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col text-end mt-3">
                <button class="btn btn-success" id="shadow" type="submit"
                    style="position: relative;">Setujui</button>
            </div>
        @else
            <div class="col text-center">
                <img src="{{ URL::asset('/img/warning.png') }}" alt="warning" width="125px;">
            </div>
            <div class="col text-center pt-3">
                <span class="mt-3">Halaman Belum Bisa Diakses</span>
            </div>
        @endif
    </div>
</div>
