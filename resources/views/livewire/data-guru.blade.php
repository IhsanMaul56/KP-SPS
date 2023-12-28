@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush
<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.delete-guru')
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: max-content;">
            </div>
            <div class="col-3" style="width: max-content;">
                <button type="button" class="btn btn-warning fw-bold" data-bs-toggle="modal" data-bs-target="#restoreModal"><i class="bi bi-arrow-repeat" style="padding-right: 5px"></i>Restore</button>
            </div>
            <div class="col-3" style="width: max-content;">
                <a href="{{ route('tambah-data-guru') }}" class="btn btn-primary" style="text-decoration: none;">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </a>
            </div>
        </div>

        <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title fw-bold" id="exampleModalLabel">RESTORE DATA GURU</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                <label>Guru :</label>
                                <select name="nip" wire:model="nip" class="form-select @error('nip') is-invalid @enderror">
                                    <option value="" selected>Pilih NIP - Nama Guru</option>
                                    @foreach ($listGuru as $guru)
                                        <option value="{{ $guru->nip }}">{{ $guru->nip }} - {{ $guru->nama_guru }}</option>
                                    @endforeach
                                </select>
                                @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top:unset !important">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" wire:click="restoreData">Restore</button>
                    </div>
                </div>
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
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteDataGuruM" wire:click="deleteGuruConfirm('{{ $item->nip }}')">
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

<script>
    Livewire.on('closeDeleteModal', function () {
        $('#DeleteDataGuruM').modal('hide');
    });
</script>
