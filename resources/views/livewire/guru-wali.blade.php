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
            <input type="text" class="form-control" wire:model="search" placeholder="Search" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 10px 10px 10px 10px;">
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
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nis }}</td>
                            <td class="text-start">{{ $item->nama_siswa }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>0</td>
                            <td class="text-start">Perlu ditingkatkan kembali</td>
                            <td>
                                <span class="btn btn-success"><i class="bi bi-eye"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col text-end mt-3">
                <button class="btn btn-success" id="shadow" type="submit" style="position: relative; border-radius: 10px 10px 10px 10px">Setujui</button>
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