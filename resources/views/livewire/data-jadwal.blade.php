@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.create-jadwal')
    @include('livewire.update-jadwal')
    @include('livewire.delete-jadwal')
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: max-content;">
            </div>
            <div class="col-3" style="width: max-content;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertJadwal">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </button>
            </div>
        </div>
        <div class="row mb-3">
            <label for="">File Exel</label>
            <div class="col">
                <input type="file" class="form-control @error('file') is-invalid @enderror" wire:model="file">
                <small>Note<b class="text-danger">*</b> : file harus bertipe .xlsx atau .xls</small>
                @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary" wire:click="importJadwal">IMPORT</button>
                <button type="button" class="btn btn-success" wire:click="exportTemplate">Download Template</button>
                <button type="button" class="btn btn-warning" wire:click="exportData">Download Data</button>
            </div>
        </div>
        <div class="row mb-3">
            @if (Session::has('berhasil') && !Session::has('gagal'))
                <div class="alert alert-success">
                    {{ Session::get('berhasil') }}
                </div>

            @elseif (Session::has('gagal') && !Session::has('berasil'))
                <div class="alert alert-danger">
                    {{ Session::get('gagal') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA GURU</th>
                    <th>MATA PELAJARAN</th>
                    <th>KELAS</th>
                    <th>HARI</th>
                    <th>WAKTU</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @if ($jadwal)
                    @foreach ($jadwal as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td class="text-start">
                                @if ($item->nama_guru)
                                    {{ $item->nama_guru }}
                                @endif
                            </td>
                            <td>
                                @if ($item->nama_mapel)
                                    {{ $item->nama_mapel }}
                                @endif
                            </td>
                            <td>{{ $item->nama_tingkat }} {{ $item->nama_kelas }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>
                                {{ substr($item->waktu_masuk, 0, 5) }} - {{ substr($item->waktu_keluar, 0, 5) }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editJurusan">
                                    <i class="bi bi-pencil-square text-white"></i>
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
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
