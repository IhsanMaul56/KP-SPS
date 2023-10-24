<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.delete-guru')
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari"
                    style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 10px 10px 10px 10px">
            </div>
            <div class="col-3" style="width: max-content;">
                <a href="{{ route('tambah-data-guru') }}" class="btn btn-primary" style="text-decoration: none;">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </a>
            </div>
        </div>
        @if (Session::has('berhasil'))
            <div class="alert alert-success">
                {{ Session::get('berhasil') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA GURU</th>
                    <th>JENIS KELAMIN</th>
                    <th>NO. HP</th>
                    <th>AKSI</th>
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
                            <a href="{{ route('update-data-guru', ['nip' => $item->nip]) }}"
                                wire:click="viewUpdate('{{ $item->nip }}')" class="btn btn-warning">
                                <i class="bi bi-pencil-square text-white"></i>
                            </a>
                            <button wire:click="deleteGuru('{{ $item->nip }}')" class="btn btn-danger"
                                data-bs-toggle="modal" data-bs-target="#DeleteDataGuruM">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $dagur->links() }}
    </div>
</div>
