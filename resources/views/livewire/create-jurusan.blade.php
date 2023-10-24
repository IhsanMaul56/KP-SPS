<div class="modal fade" id="InsertJurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan dan Kepala Jurusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (Session::has('berhasil'))
                    <div class="alert alert-success">
                        {{ Session::get('berhasil') }}
                    </div>
                @endif

                @if (Session::has('gagal'))
                    <div class="alert alert-danger">
                        {{ Session::get('gagal') }}
                    </div>
                @endif

                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Kepala Jurusan :</label>
                        <select wire:model="guru_id" name="guru" class="form-control">
                            <option value="">NIP Guru - Nama Guru</option>
                            @foreach ($guruList as $nipGuru => $namaGuru)
                                <option value="{{ $nipGuru }}">{{ $nipGuru }} - {{ $namaGuru }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label>Nama Jurusan :</label>
                        <input wire:model="nama_jurusan" type="text" class="form-control" placeholder="Jurusan">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <button type="button" class="btn btn-primary" wire:click="createJurusan">Simpan</button>
            </div>
        </div>
    </div>
</div>