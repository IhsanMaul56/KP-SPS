<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.delete-jurusan')
    @include('livewire.create-jurusan')
    @include('livewire.update-jurusan')
    <div class="col">
        <div class="col mb-3 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertJurusan">
                <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
            </button>
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
                    <th>NAMA JURUSAN</th>
                    <th>KEPALA JURUSAN</th>
                    <th>KELAS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($jurusan as $item)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td class="text-start">{{ $item->nama_jurusan}}</td>
                    @if ($item->kajur_id) 
                        <td class="text-start">{{ $item->nama_guru}}</td>
                    @else
                        <td>-</td>
                    @endif
                    <td>{{ $this->countKelas( $item->kode_jurusan) }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#UpdateJurusan" wire:click="editJurusan({{ $item->kode_jurusan }})">
                            <i class="bi bi-pencil-square text-white"></i>
                        </button>
                        <button wire:click="deleteJurusanConfirm('{{ $item->kode_jurusan }}')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteDataJurusan">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $jurusan->links() }}   
    </div>
</div>