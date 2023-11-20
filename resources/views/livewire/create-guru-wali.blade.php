<div class="modal fade" id="InsertGuruWali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH WALI KELAS</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label>Tingkat :</label>
                        <select name="tingkat_id" wire:model="tingkat_id" class="form-select @error('tingkat_id') is-invalid @enderror">
                            <option value="" hidden selected>Pilih Tingkat</option>
                            @foreach ($tingkatList as $kodeTingkat => $namaTingkat)
                                <option value="{{ $kodeTingkat }}">{{ $namaTingkat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Kelas :</label>
                        <select name="kelas_id" wire:model="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                            <option value="" hidden selected>Pilih Jurusan - Kelas</option>
                            @foreach ($kelasList as $kodeKelas => $namaKelas)
                                <option value="{{ $kodeKelas }}">{{ $namaJurusan[$kodeKelas] }} - {{ $namaKelas }}</option>
                            @endforeach
                        </select>                        
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Guru :</label>
                        <select name="wali_id" wire:model="wali_id" class="form-select @error('wali_id') is-invalid @enderror">
                            <option value="" hidden selected>Pilih NIP - Nama Guru</option>
                            @foreach ($guruList as $nipGuru => $namaGuru)
                                <option value="{{ $nipGuru }}">{{ $nipGuru }} - {{ $namaGuru }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:unset !important">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" wire:click="createWali">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>
