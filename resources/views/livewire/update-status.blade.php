<div class="modal fade" id="UpdateStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Update Status</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label>Status :</label>
                        <select wire:model="data.status" name="status" class="form-control">
                            <option value="">-- Select Status --</option>
                            <option value="aktif" @if ($status == 'aktif') selected @endif>Aktif
                            </option>
                            <option value="tidak aktif" @if ($status == 'tidak aktif') selected @endif>Tidak
                                Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: unset !important">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" wire:click.prevent="updateStatus" class="btn btn-primary">Update
                        Status</button>
                </div>
            </div>
        </div>
    </div>
</div>