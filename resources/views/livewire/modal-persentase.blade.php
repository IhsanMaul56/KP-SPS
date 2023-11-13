<div class="modal fade" id="InsertPercent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">ATUR PERSENTASE NILAI</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="">Mata Pelajaran :</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select name="" id="" class="form-select">
                            <option value="" hidden selected>Pilih Mata Pelajaran</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Nilai Formatif :</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" name="" id="" placeholder="Masukkan Persentase Formatif">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Nilai Sumatif :</label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" class="form-control" name="" id="" placeholder="Masukkan Persentase UTS">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="" id="" placeholder="Masukkan Persentase UAS">
                    </div>
                </div>
            </div> 
            <div class="modal-footer" style="border-top: unset">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click="createPengampu">Simpan</button>
            </div>
        </div>
    </div>
</div>
