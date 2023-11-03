<div class="modal fade" id="UpdateMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="resetFields"></button>
            </div>
            <div class="modal-body">
                @if (Session::has('berhasil'))
                    <div class="alert alert-success">
                        {{ Session::get('berhasil') }}
                    </div>
                @endif

                @if (Session::has('gagal'))
                    <div class="alert alert-danger">
                        {{ Session::get('gagal') }}
                    </div>
                @endif
                <div class="row mt-3">
                    <div class="col">
                        <label>Nama Mata Pelajaran :</label>
                        <input wire:model="data.nama_mapel" type="text" class="form-control" placeholder="Masukan nama mapel">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="updateSelectedMapel">Simpan</button>
            </div>
        </div>
    </div>
</div>
