{{-- <div class="modal fade" id="UpdateStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Update Status</h5>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateStatus" method="POST" action="{{ route('aktifasi-tahun-akademik') }}">
                    <div class="row mb-3">
                        <div class="col">
                            <label>Status :</label>
                            <select wire:model="data.status" name="status" class="form-control">
                                <option value="">-- Select Status --</option>
                                <option value="aktif" @if ($tahun == 'aktif') selected @endif>Aktif
                                </option>
                                <option value="tidak aktif" @if ($tahun == 'tidak aktif') selected @endif>Tidak
                                    Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: unset !important">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <input type="input" value="Update Status" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
