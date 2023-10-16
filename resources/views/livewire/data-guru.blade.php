<div class="card-body h-100 overflow-auto">
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 10px 10px 10px 10px">
            </div>
            <div class="col-3" style="width: max-content;">
                <a href="{{ route('tambah-data-guru') }}" class="btn btn-primary" style="text-decoration: none;">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dagur as $index => $item)
                    <tr class="text-center">
                        <td>{{ $dagur->firstItem() + $index }}</td>
                        <td>{{ $item->nip }}</td>
                        <td class="text-start">{{ $item->nama_guru }}</td>
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
        {{ $dagur->links() }}
    </div>
</div>