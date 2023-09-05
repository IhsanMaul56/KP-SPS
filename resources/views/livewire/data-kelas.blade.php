<div class="col">
    <h3>Data Kelas</h3>
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 25%; border-color: black;">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kelas</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
                <!-- Tambahkan kolom lain di sini -->
            </tr>
        </thead>
        <tbody>
            @foreach ($dakel as $index => $item)
                <tr>
                    <td>{{ $dakel->firstItem() + $index }}</td>
                    <td>{{ $item->nama_kelas}}</td>
                    <td>{{ $item->nama_jurusan}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editKelas">
                            Edit
                        </button>
                            <!-- Modal Edit Jurusan-->
                            <div class="modal fade" id="editJurusan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Kelas</h5>
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
                        <span class="btn btn-danger">Hapus</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dakel->links() }}   
</div>