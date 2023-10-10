<div class="card-body h-100 overflow-auto">
    <div class="col">
        <div class="col mb-3 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertData">
                <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
            </button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Wali Kelas</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $index => $item)
                    <tr class="text-center">
                        <td>{{ $dakel->firstItem() + $index }}</td>
                        <td>{{ $item->nama_tingkat }} {{ $item->nama_kelas}}</td>
                        <td>{{ $item->nama_guru }}</td>
                        <td>
                            @if ($item->guru_no_hp)
                                {{ $item->guru_no_hp }}
                            @else
                                Tidak Ditemukan
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editJurusan">
                                <i class="bi bi-pencil-square text-white"></i>
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
                                <span class="btn btn-danger"><i class="bi bi-trash3"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dakel->links() }}
    </div>
</div>