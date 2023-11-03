<div class="modal fade" id="UpdateGuruWali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">EDIT WALI KELAS</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Tingkat :</label>
                        <select name="tingkat_id" wire:model="data.tingkat_id" class="form-control" disabled>
                            <option value="">Pilih Tingkat</option>
                            @foreach ($tingkatList as $kodeTingkat => $namaTingkat)
                                <option value="{{ $kodeTingkat }}">{{ $namaTingkat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Kelas :</label>
                        <select name="kelas_id" wire:model="data.kelas_id" class="form-control" disabled>
                            <option value="">Jurusan - Kelas</option>
                            @foreach ($kelasListEdit as $kelas)
                                <option value="{{ $kelas->kode_kelas ?? $kelas['kode_kelas'] }}">{{ $kelas->nama_jurusan ?? $kelas['nama_jurusan'] }} - {{ $kelas->nama_kelas ?? $kelas['nama_kelas'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Pilih Guru :</label>
                        <select name="wali_id" wire:model="data.wali_id" class="form-control">
                            <option value="" hidden selected>NIP - Nama Guru</option>
                            @foreach ($guruListEdit as $guru)
                                @if(is_object($guru))
                                    <option value="{{ $guru->nip }}">{{ $guru->nip }} - {{ $guru->nama_guru }}</option>
                                @elseif(is_array($guru) && isset($guru['nip']))
                                    <option value="{{ $guru['nip'] }}">{{ $guru['nip'] }} - {{ $guru['nama_guru'] }}</option>
                                @endif
                            @endforeach
                        </select>                        
                    </div>
                </div>
                <div class="modal-footer" style="border-top:unset !important">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="updateSelectedWali">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
