<div class="card-body h-100 overflow-auto">
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 10px 10px 10px 10px">
            </div>
            <div class="col-3" style="width: max-content;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertData">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $no = 1; ?>
                <tbody>
                    @foreach ($siswa as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nis }}</td>
                            <td class="text-start">{{ $item->nama_siswa }}</td>
                            <td>
                                @if ($item->siswa_tingkat && $item->siswa_kelas)
                                    {{ $item->siswa_tingkat }} {{ $item->siswa_kelas }}
                                @else
                                    Data tidak Ditemukan
                                @endif
                            </td>                                
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>
                                <a href="{{ route('update-data-siswa') }}" class="btn btn-warning" style="text-decoration: none">
                                        <i class="bi bi-pencil-square text-white"></i>
                                </a>
                                <span class="btn btn-danger"><i class="bi bi-trash3"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $siswa->links() }}
        </div> 
    </div>
</div>