<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.delete-kelas')
    @include('livewire.create-kelas')
    @include('livewire.update-kelas')
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: max-content;">
            </div>
            <div class="col-3" style="width: max-content;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertKelas">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </button>
            </div>
            </div>
            <table class="table table-bordered">
                @if (Session::has('berhasil'))
                    <div class="alert alert-success">
                        {{ Session::get('berhasil') }}
                    </div>
                @endif
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>KELAS</th>
                        <th>WALI KELAS</th>
                        <th>NO. HP</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <?php $no = 1 ?>
                <tbody>
                    @foreach ($kelas as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama_tingkat }} {{ $item->nama_kelas}}</td>
                            <td class="text-start">
                                @if ($item->nama_guru)
                                    {{ $item->nama_guru }}
                                @else
                                    Belum memiliki wali kelas
                                @endif
                            </td>
                            <td>
                                @if ($item->guru_no_hp)
                                    {{ $item->guru_no_hp }}
                                @else
                                    Tidak Ditemukan
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#UpdateKelas" wire:click="editKelas({{ $item->kode_kelas }})">
                                    <i class="bi bi-pencil-square text-white"></i>
                                </button>
                                <button wire:click="deleteKelasConfirm('{{ $item->kode_kelas }}')" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteDataKelas">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            {{ $kelas->links() }}
    </div>
</div>
