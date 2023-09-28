<div class="row">
    <div class="col mb-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1);">
    </div>
    <div class="col-3 mb-3" style="width: max-content; position: relative;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertData">
            <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
        </button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
                <th>Aksi</th>
                <!-- Tambahkan kolom lain di sini -->
            </tr>
        </thead>
        <tbody>
            @foreach ($dasis as $index => $item)
                <tr>
                    <td>{{ $dasis->firstItem() + $index }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>-</td>
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