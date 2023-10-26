<div class="modal fade" id="InsertGuruMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH GURU UNTUK MATA PELAJARAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <div class="row mb-3">
                <div class="col">
                    <label>Pilih Guru :</label>
                    <select name="guru" class="form-control">
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
                    <select name="guru" class="form-control">
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
            <button type="button" class="btn btn-primary">Simpan</button>
        </div>
        </div>
    </div>
</div>