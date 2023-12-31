<div class="modal fade" id="InsertGuruMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH GURU MATA PELAJARAN</h5>
            </div>
            <div class="modal-body">
                @if ($gagalMessage)
                    <div class="alert alert-danger">
                        {{ $gagalMessage }}
                    </div>
                @elseif (Session::has('gagal'))
                    <div class="alert alert-danger">
                        {{ Session::get('gagal') }}
                    </div>
                @endif
                <div class="row mb-3">
                    <div class="col">
                        <label>Guru :</label>
                        <select name="pengampu_id" wire:model="pengampu_id" class="form-select @error('pengampu_id') is-invalid @enderror">
                            <option value="" hidden selected>Pilih NIP - Nama Guru</option>
                            @foreach ($guruList as $nipGuru => $namaGuru)
                                <option value="{{ $nipGuru }}">{{ $nipGuru }} - {{ $namaGuru }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Mata Pelajaran :</label>
                        <select name="mapel_id" wire:model="mapel_id" class="form-select @error('mapel_id') is-invalid @enderror">
                            <option value="" hidden selected>Pilih Kode Mapel - Nama Mapel</option>
                            @foreach ($mapelList as $kodeMapel => $namaMapel)
                                <option value="{{ $kodeMapel }}">{{ $kodeMapel }} - {{ $namaMapel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top:unset !important">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click="createPengampu">Tambah</button>
            </div>
        </div>
    </div>
</div>
