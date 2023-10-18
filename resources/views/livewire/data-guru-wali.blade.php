@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush


<div class="card-body h-100 overflow-auto">
    @include('livewire.create-guru-wali')
    @include('livewire.update-guru-wali')
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 10px 10px 10px 10px">
            </div>
            <div class="col-3" style="width: max-content;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertGuruWali">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </button>
            </div>
        </div>
    </div>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Kelas</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($wali as $item)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->wali_id }}</td>
                        <td>{{ $item->nama_guru }}</td>
                        <td>{{ $item->nama_tingkat }} {{ $item->nama_kelas }}</td>
                        <td class="text-start">
                            @if ($item->guru_no_hp)
                                {{ $item->guru_no_hp }}
                            @else
                                Tidak Ditemukan
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#UpdateGuruWali">
                                <i class="bi bi-pencil-square text-white"></i>
                            </button>
                            <span class="btn btn-danger"><i class="bi bi-trash3"></i></span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $wali->links() }}
    </div>
</div>
