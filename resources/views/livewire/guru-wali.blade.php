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
    <div class="my-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 25%; border-color: black;">
        @if ($dataSiswa != null)    
            <table class="table">
                <thead>
                    <tr>
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
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>
                                <span class="btn btn-primary">Edit</span>
                                <span class="btn btn-danger">Hapus</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="col text-center">
                <img src="{{URL::asset('/img/warning.png')}}" alt="warning" width="125px;">
            </div>
            <div class="col text-center pt-3">
                <span class="mt-3">Halaman Belum Bisa Diakses</span>
            </div>
        @endif
    </div>