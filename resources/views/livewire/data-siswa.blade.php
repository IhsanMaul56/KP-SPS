<div class="col">
    <h3>Data Siswa</h3>
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 25%; border-color: black;">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
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
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSiswa">
                            Edit Data Siswa
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
                        <span class="btn btn-danger">Hapus</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dasis->links() }}  
</div>