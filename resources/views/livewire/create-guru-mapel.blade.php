<div class="modal fade" id="InsertGuruMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH GURU UNTUK MATA PELAJARAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Guru :</label>
                        <select name="pengampu_id" wire:model="pengampu_id" class="form-control">
                            <option value="" hidden selected>NIP Guru - Nama Guru</option>
                            @foreach ($guruList as $nipGuru => $namaGuru)
                                <option value="{{ $nipGuru }}">{{ $nipGuru }} - {{ $namaGuru }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label>Pilih Mata Pelajaran :</label>
                        <select name="mapel_id" wire:model="mapel_id" class="form-control">
                            <option value="" hidden selected>Kode Mapel - Nama Mapel</option>
                            @foreach ($mapelList as $kodeMapel => $namaMapel)
                                <option value="{{ $kodeMapel }}">{{ $kodeMapel }} - {{ $namaMapel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="createPengampu">Simpan</button>
            </div>
        </div>
    </div>
</div>
