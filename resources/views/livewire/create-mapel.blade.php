<div class="modal fade" id="InsertMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH MATA PELAJARAN</h5>
            </div>
            <div class="modal-body">
                @if (Session::has('gagal'))
                    <div class="alert alert-danger">
                        {{ Session::get('gagal') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <label>Nama Mata Pelajaran :</label>
                        <input wire:model="nama_mapel" type="text" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="Masukkan Nama Mata Pelajaran">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: unset">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click="createMapel">Tambah</button>
            </div>
        </div>
    </div>
</div>
