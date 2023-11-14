<!-- Modal -->
<div wire:ignore.self  class="modal fade" id="DeleteDataKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:325px;">
        <div class="modal-content" style="border-radius: 12px;">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center titlemodal-style fw-bold" id="deleteDataModalLabel">HAPUS KELAS</h5>
            </div>
            <div class="modal-body">
                <div class="text-break text-center textdisable-modal">Apakah Anda yakin ingin menghapus data ini?</div>
                <div class="modal-footer justify-content-center" style="border-top:unset !important">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Batal</button>
                    <button wire:click="deleteKelas" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
