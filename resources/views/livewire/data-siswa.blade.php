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
                    <td></td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td></td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editJurusan">
                            <i class="bi bi-pencil-square text-white"></i>
                        </button>
                            <!-- Modal Edit Siswa-->
                            <div class="modal fade" id="editSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-primary">Simpan Data</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <span class="btn btn-danger"><i class="bi bi-trash3"></i></span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dasis->links() }}  
</div>