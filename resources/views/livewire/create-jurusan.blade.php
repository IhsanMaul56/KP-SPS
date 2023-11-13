<div class="modal fade" id="InsertJurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH JURUSAN</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label>Kepala Jurusan :</label>
                        <select wire:model="guru_id" name="guru" class="form-select">
                            <option value="" hidden selected>Pilih NIP - Nama Guru</option>
                            @foreach ($guruList as $nipGuru => $namaGuru)
                                <option value="{{ $nipGuru }}">{{ $nipGuru }} - {{ $namaGuru }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Nama Jurusan :</label>
                        <input wire:model="nama_jurusan" type="text" class="form-control" placeholder="Masukkan Nama Jurusan">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top:unset !important">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click="createJurusan">Tambah</button>
            </div>
        </div>
    </div>
</div>