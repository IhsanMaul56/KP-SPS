<div class="modal fade" id="UpdatePeriode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">EDIT PERIODE</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label>Atur Tanggal Awal Input Nilai :</label>
                        <input type="datetime-local" class="form-control" wire:model='data.start_date'>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Atur Tanggal Akhir Input Nilai :</label>
                        <input type="datetime-local" class="form-control" wire:model='data.end_date'>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top:unset !important">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="updateData">Update</button>
            </div>
        </div>
    </div>
</div>
