@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
    {{-- <script>
        // Reset modal form after data is saved
        Livewire.on('guruStored', function () {
            $('#formTambahGuru')[0].reset();
            $('#insertData').modal('hide');
        });
    </script> --}}
@endpush

<div class="row">
    <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1);">
    <div class="col-3" style="width: max-content;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertData">
            <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
        </button>
    </div>
            <!-- Modal Edit Siswa-->
            <div class="modal fade" id="insertData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Guru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <form action="POST" wire:submit.prevent="store" method="">
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>NIP</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="nip" id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);">
                                            @error('nip')    
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>Nama</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="namaGuru" id="nama" type="text" class="form-control @error('nama_guru') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);">
                                            @error('namaGuru')    
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>Tempat Lahir</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="tempatLahir" id="tempat_lahir" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>Tanggal Lahir</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="tanggalLahir" id="tanggal_lahir" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>Jenis Kelamin</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="jenis_kelamin" id="jenis_kelamin" type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);">
                                            @error('jenis_kelamin')    
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>Agama</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="agama" id="agama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>No HP</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="no_hp" id="no_hp" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>Provinsi</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="provinsi" id="provinsi" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>Kota</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="kota" id="kota" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>Desa</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="desa" id="desa" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>RT</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="rt" id="rt" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>RW</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="rw" id="rw" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3" style="width: 30%;">
                                        <span>Alamat</span>
                                    </div>
                                    <div class="col-3" style="width: 40%;">
                                        <div class="input-group">
                                            <input wire:model="alamat" id="alamat" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                        </div>
                                    </div>
                                </div>  
                            </form>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
                </div>
            </div>
    {{-- </div> --}}
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dagur as $index => $item)
                <tr>
                    <td>{{ $dagur->firstItem() + $index }}</td>
                    <td></td>
                    <td>{{ $item->nama_guru }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dagur->links() }}
</div>
