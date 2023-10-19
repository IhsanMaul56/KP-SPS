<div class="card-body h-100 overflow-auto">
    @include('livewire.create-guru-mapel')
    @include('livewire.update-guru-mapel')
    @include('livewire.delete-pengampu')
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 10px 10px 10px 10px">
            </div>
            <div class="col-3" style="width: max-content;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertGuruMapel">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </button>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($pengampu as $item)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->pengampu_id }}</td>
                    <td>{{ $item->nama_guru }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td class="text-start">
                        @if ($item->guru_no_hp)
                            {{ $item->guru_no_hp }}
                        @else
                            Tidak Ditemukan
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#UpdateGuruMapel">
                            <i class="bi bi-pencil-square text-white"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteDataPengampu">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pengampu->links() }}
</div>
