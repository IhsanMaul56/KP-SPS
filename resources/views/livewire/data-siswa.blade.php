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
        </div>
        <div class="col-3" style="width: max-content;">
            <a href="{{ route('tambah-data-siswa') }}" class="btn btn-primary" style="text-decoration: none;">
                <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
            </a>
        </div>
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
            <tbody>
                @foreach ($dasis as $index => $item)
                    <tr class="text-center">
                        <td>{{ $dasis->firstItem() + $index }}</td>
                        <td>{{ $item->nis }}</td>
                        <td class="text-start">{{ $item->nama_siswa }}</td>
                        <td>X AKL 1</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editJurusan">
                                <i class="bi bi-pencil-square text-white"></i>
                            </button>
                            <span class="btn btn-danger"><i class="bi bi-trash3"></i></span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $dasis->links() }}  
    </div>
</div>