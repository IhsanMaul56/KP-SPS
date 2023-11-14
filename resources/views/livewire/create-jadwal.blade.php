<div class="modal fade" id="InsertJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH JADWAL</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Tingkat :</label>
                        <select name="tingkat_id" wire:model="tingkat_id" class="dropdown-item border p-2" style="border-radius: 5px 5px 5px 5px">
                            <option value="" hidden selected>Tingkat</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Kelas :</label>
                        <select name="kelas_id" wire:model="kelas_id" class="dropdown-item border p-2" style="border-radius: 5px 5px 5px 5px">
                            <option value="" hidden selected>Jurusan - Kelas</option>
                        </select>                        
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Guru :</label>
                        <select name="wali_id" wire:model="wali_id" class="dropdown-item border p-2" style="border-radius: 5px 5px 5px 5px">
                            <option value="" hidden selected>NIP - Nama Guru</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:unset !important">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" wire:click="createWali">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>
