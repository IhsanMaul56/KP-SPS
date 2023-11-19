<div class="col">
    <div class="card-body h-100 overflow-auto shadow">
        @include('livewire.modal-delete-pengumuman')
        @if ($pengumumanList->isEmpty())
            <div class="row m-0 p-0 mb-3">
                <img src="{{URL::asset('/img/no-data.png')}}" alt="clipboard" width="150px"><br>
                <span class="fs-5" style="text-align: center; color: grey;">Tidak Ada Pengumuman Saat Ini</span>
            </div>
        @else
            <div class="row">
                <div class="col text-center">
                    <h4>Riwayat Pengumuman</h4><hr>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Mata Pelajaran</td>
                                <td>Tingkat</td>
                                <td>Kelas</td>
                                <td>Deskripsi</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($pengumumanList as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_mapel }}</td>
                                    <td>{{ $item->kelas_id }}</td>
                                    <td>{{ $item->nama_kelas }}</td>
                                    <td>
                                        {!! $item->deskripsi !!}
                                    </td>
                                    <td>
                                        <button wire:click="deletePengumumanConfirm('{{ $item->kode_pengumuman }}')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteDataPengumuman">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>