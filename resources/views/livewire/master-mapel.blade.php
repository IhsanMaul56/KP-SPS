<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.create-mapel')
    @include('livewire.update-mapel')
    @include('livewire.delete-mapel')
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari"
                    style="width: max-content;">
            </div>
            <div class="col-3" style="width: max-content;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertMapel">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </button>
            </div>
        </div>
        <table class="table table-bordered">
            @if (Session::has('berhasil'))
                <div class="alert alert-success">
                    {{ Session::get('berhasil') }}
                </div>
            @elseif (Session::has('gagal'))
                <div class="alert alert-danger">
                    {{ Session::get('gagal') }}
                </div>
            @endif
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA MATA PELAJARAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>
                @foreach ($mapel as $item)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#UpdateMapel" wire:click="editMapel({{ $item->kode_mapel }})">
                            <i class="bi bi-pencil-square text-white"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteDataMapel" wire:click="deleteMapelConfirm({{ $item->kode_mapel }})">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $mapel->links() }}
    </div>
</div>
