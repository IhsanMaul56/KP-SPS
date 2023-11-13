<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.delete-siswa')
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: max-content;">
            </div>
            <div class="col-3" style="width: max-content;">
                <a href="{{ route('tambah-data-siswa') }}" class="btn btn-primary" style="text-decoration: none;">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </a>
            </div>
        </div>
        <div>
        @if (Session::has('berhasil'))
            <div class="alert alert-success">
                {{ Session::get('berhasil') }}
            </div>
        @endif
        @if (session()->has('gagal'))
            <div class="alert alert-danger">
                {{ session('gagal') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>NIS</th>
                    <th>NAMA SISWA</th>
                    <th>KELAS</th>
                    <th>JENIS KELAMIN</th>
                    <th>NO. HP</th>
                    <th>AKSI</th>
                </tr>
                </thead>
                <?php $no = 1; ?>
                <tbody>
                    @foreach ($siswa as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nis }}</td>
                            <td class="text-start">{{ $item->nama_siswa }}</td>
                            <td>
                                @if ($item->siswa_tingkat && $item->siswa_kelas)
                                    {{ $item->siswa_tingkat }} {{ $item->siswa_kelas }}
                                @else
                                    Data tidak Ditemukan
                                @endif
                            </td>                                
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>
                                <a href="{{ route('update-data-siswa', ['nis' => $item->nis]) }}" wire:click="viewUpdate('{{ $item->nis }}')" class="btn btn-warning ling">
                                        <i class="bi bi-pencil-square text-white"></i>
                                </a>
                                <button wire:click="deleteSiswaConfirm('{{ $item->nis }}')" data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#DeleteDataSiswa">
                                    <i class="bi bi-trash3"></i>
                                </button>                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $siswa->links() }}
        </div>
    </div>
</div>

<script>
    Livewire.on('closeDeleteModal', function () {
        $('#DeleteDataSiswa').modal('hide');
    });
</script>