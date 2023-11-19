<div class="modal fade" id="UpdateJurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">EDIT JURUSAN</h5>
            </div>
            <div class="modal-body">
                @if (Session::has('gagal'))
                    <div class="alert alert-danger">
                        {{ Session::get('gagal') }}
                    </div>
                @endif
                <div class="row mb-3">
                    <div class="col">
                        <label>Kepala Jurusan :</label>
                        <select wire:model="selectedJurusan.guru_id" name="guru" class="form-select">
                            <option value="" hidden selected>Pilih NIP Guru - Nama Guru</option>
                            @foreach ($guruList as $nipGuru => $namaGuru)
                                <option value="{{ $nipGuru }}">{{ $nipGuru }} - {{ $namaGuru }}</option>
                            @endforeach
                        </select>                                               
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Nama Jurusan :</label>
                        <input wire:model="selectedJurusan.nama_jurusan" type="text" class="form-control" placeholder="Jurusan">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top:unset !important">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="updateSelectedJurusan">Update</button>
            </div>
        </div>
    </div>
</div>