<div class="col">
    <div class="persegi2 m-0">
        <p class="text-white m-0 fs-5">{{ $kelas }}</p>
    </div>
    <div class="my-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 25%; border-color: black;">
        @if ($dataSiswa != null)    
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($dataSiswa as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
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
            <p>Anda tidak menjadi wali kelas</p>
        @endif
    </div>
</div>
