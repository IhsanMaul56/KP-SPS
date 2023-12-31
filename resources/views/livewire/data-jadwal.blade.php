@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.update-jadwal')
    @include('livewire.delete-jadwal')
    <div class="col">
        <div class="row">
            <div class="col form-control" style="margin-left: 12px; margin-right: 12px;">
                <div class="row">
                    <label for="" class="mb-2 fs-5">File Excel</label>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="file" class="form-control mb-1 @error('file') is-invalid @enderror"
                            wire:model="file">
                        <b class="text-danger">*</b><small style="color: grey">Note: File Harus Bertipe .xlsx atau
                            .xls</small>
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" wire:click="importJadwal"><i
                                class="bi-cloud-upload" style="padding-right: 5px"></i>Import</button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-success" wire:click="exportTemplate"><i
                                class="bi-cloud-download" style="padding-right: 5px"></i>Download Template</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-warning" wire:click="exportData"><i
                                class="bi-cloud-download" style="padding-right: 5px"></i>Download Data</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col my-2">
            @if (session()->has('berhasil') && !session()->has('gagal'))
                <div class="alert alert-success">
                    {{ session('berhasil') }}
                </div>
            @elseif (session()->has('gagal') && !session()->has('berhasil'))
                <div class="alert alert-danger">
                    {{ session('gagal') }}
                </div>
            @endif
        </div>
        <div class="col">
            <input type="text" class="form-control mb-3 mt-3" wire:model="search" placeholder="Cari"
                style="width: max-content;">
        </div>
        @if (session()->has('berhasilUpdate'))
            <div class="alert alert-success">
                {{ session('berhasilUpdate') }}
            </div>
        @endif
        @if (session()->has('gagalUpdate'))
            <div class="alert alert-danger">
                {{ session('gagalUpdate') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>HARI</th>
                    <th>WAKTU</th>
                    <th>KELAS</th>
                    <th>MATA PELAJARAN</th>
                    <th>NAMA GURU</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @if ($jadwal)
                    @foreach ($jadwal as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>
                                {{ substr($item->waktu_masuk, 0, 5) }} - {{ substr($item->waktu_keluar, 0, 5) }}
                            </td>
                            <td>{{ $item->nama_tingkat }} {{ $item->nama_kelas }}</td>
                            <td>
                                @if ($item->nama_mapel)
                                    {{ $item->nama_mapel }}
                                @endif
                            </td>
                            <td class="text-start">
                                @if ($item->nama_guru)
                                    {{ $item->nama_guru }}
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#UpdateJadwal" wire:click="editJadwal({{ $item->kode_jadwal }})">
                                    <i class="bi bi-pencil-square text-white"></i>
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    wire:click="deleteJadwalConfirm('{{ $item->kode_jadwal }}')"
                                    data-bs-target="#DeleteDataJadwal">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ $jadwal->links() }}
    </div>
</div>
