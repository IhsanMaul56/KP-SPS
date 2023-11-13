<div class="modal fade" id="InsertKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH KELAS</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label>Jurusan :</label>
                        <select wire:model="jurusan_id" class="form-select">
                            <option value="" hidden selected>Pilih Jurusan</option>
                            @foreach ($jurusanList as $kodeJurusan => $namaJurusan)
                                <option value="{{ $kodeJurusan }}">{{ $namaJurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Tingkat :</label>
                        <select wire:model="tingkat_id" class="form-select">
                            <option value="" hidden selected>Pilih Tingkat</option>
                            @foreach ($tingkatList as $kodeTingkat => $namaTingkat)
                                <option value="{{ $kodeTingkat }}">{{ $namaTingkat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label>Nama Kelas :</label>
                        <input wire:model="nama_kelas" type="text" class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="Masukkan Nama Kelas">
                        @error('nama_kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: unset">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click="createKelas">Tambah</button>
            </div>
        </div>
    </div>
</div>
