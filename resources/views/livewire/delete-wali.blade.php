<!-- Modal -->
<div wire:ignore.self  class="modal fade" id="DeleteDataWali" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="deleteDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:325px;">
        <div class="modal-content" style="border-radius: 12px;">
            <div class="modal-header" style="border-bottom:unset !important">
                <h5 class="modal-title w-100 text-center titlemodal-style fw-bold" id="deleteDataModalLabel">HAPUS</h5>
            </div>
            <div class="modal-body">
                <img src="\assets\img\trash-can.gif" alt="" class="mx-auto d-block pb-3" style="max-width:84px">
                <div class="text-break text-center textdisable-modal">Anda yakin ingin menghapus data ini? Tindakan ini tidak bisa dibatalkan</div>
                <div class="modal-footer justify-content-center" style="border-top:unset !important">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Tutup</button>
                    <button wire:click="deleteWali" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
