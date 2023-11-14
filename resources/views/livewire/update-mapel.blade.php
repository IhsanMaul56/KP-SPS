<div class="modal fade" id="UpdateMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">EDIT MATA PELAJARAN</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label>Nama Mata Pelajaran :</label>
                        <input wire:model="data.nama_mapel" type="text" class="form-control" placeholder="Masukkan Nama Mata Pelajaran">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: unset">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="updateSelectedMapel">Update</button>
            </div>
        </div>
    </div>
</div>
