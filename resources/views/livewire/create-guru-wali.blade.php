<div class="modal fade" id="InsertGuruWali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH GURU UNTUK WALI KELAS</h5>
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
                <div class="row mt-3">
                    <div class="col">
                        <label>Pilih Tingkat :</label>
                        <select name="tingkat_id" wire:model="tingkat_id" class="form-control">
                            <option value="" hidden selected>Pilih Tingkat</option>
                            @foreach ($tingkatList as $kodeTingkat => $namaTingkat)
                                <option value="{{ $kodeTingkat }}">{{ $namaTingkat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Kelas :</label>
                        <select name="kelas_id" wire:model="kelas_id" class="form-control">
                            <option value="" hidden selected>Jurusan - Kelas</option>
                            @foreach ($kelasList as $kodeKelas => $namaKelas)
                                <option value="{{ $kodeKelas }}">{{ $namaJurusan[$kodeKelas] }} - {{ $namaKelas }}</option>
                            @endforeach
                        </select>                        
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Guru :</label>
                        <select name="wali_id" wire:model="wali_id" class="form-control">
                            <option value="" hidden selected>NIP Guru - Nama Guru</option>
                            @foreach ($guruList as $nipGuru => $namaGuru)
                                <option value="{{ $nipGuru }}">{{ $nipGuru }} - {{ $namaGuru }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click="createWali">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
