<div class="modal fade" id="UpdateJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">EDIT JADWAL</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Tingkat :</label>
                        <select name="tingkat_id" wire:model="data.tingkat_id" class="form-control" disabled>
                            <option value="">Pilih Tingkat</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Kelas :</label>
                        <select name="kelas_id" wire:model="data.kelas_id" class="form-control" disabled>
                            <option value="">Jurusan - Kelas</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Guru :</label>
                        <select name="wali_id" wire:model="data.wali_id" class="form-select">
                            <option value="" hidden selected>NIP - Nama Guru</option>
                        </select>                        
                    </div>
                </div>
                <div class="modal-footer" style="border-top:unset !important">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="updateSelectedWali">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
