<div class="modal fade" id="UpdateJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">EDIT JADWAL</h5>
            </div>
            <div class="modal-body">
                @if (session()->has('berhasilUpdate'))
                    <div class="alert alert-success">
                        {{ session('berhasilUpdate') }}
                    </div>
                @endif
                @if (session()->has('gagalUpdate'))
                    <div class="alert alert-danger">
                        {{ session('gagalUpdate') }}
                    </div>
                @endif
                <div class="row mb-3">
                    <div class="col">
                        <label>Pengampu :</label>
                        <select name="pengampu_id" wire:model="data.pengampu_id"
                            class="form-control @error('data.pengampu_id') is-invalid @enderror" disabled>
                            <option value="" hidden selected>Pilih Nama Guru - Mata Pelajaran</option>
                            @foreach ($pengampu as $guru)
                                <option value="{{ $guru->kode_pengampu }}">{{ $guru->nama_guru }} - {{ $guru->nama_mapel }}</option>
                            @endforeach

                            {{-- @foreach ($pengampuList as $kodePengampu => $namaGuru)
                                <option value="{{ $kodePengampu }}">{{ $namaGuru }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>Tingkat :</label>
                        <select name="tingkat_id" wire:model="data.tingkat_id"
                            class="form-control  @error('data.tingkat_id') is-invalid @enderror" disabled>
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
                        <select name="kelas_id" wire:model="data.kelas_id"
                            class="form-select @error('data.kelas_id') is-invalid @enderror">
                            <option value="" hidden selected>Pilih Kelas</option>
                            @foreach ($kelasList as $kodeKelas => $namaKelas)
                                <option value="{{ $kodeKelas }}">{{ $namaKelas }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($jadwals)
                    <div class="row mb-3">
                        <div class="col">
                            <label>Hari :</label>
                            <input wire:model="data.hari" type="text"
                                class="form-control @error('data.hari') is-invalid @enderror"
                                placeholder="Masukkan Hari" value="{{ $jadwals->hari }}"
                                oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>Waktu Masuk :</label>
                            <input wire:model="data.waktu_masuk" type="text"
                                class="form-control @error('data.waktu_masuk') is-invalid @enderror"
                                placeholder="Masukkan Waktu Masuk" value="{{ $jadwals->waktu_masuk }}"
                                oninput="this.value = this.value.replace(/[^0-9:]/g, '')">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>Waktu Keluar :</label>
                            <input wire:model="data.waktu_keluar" type="text"
                                class="form-control @error('data.waktu_keluar') is-invalid @enderror"
                                placeholder="Masukkan Waktu Keluar" value="{{ $jadwals->waktu_keluar }}"
                                oninput="this.value = this.value.replace(/[^0-9:]/g, '')">
                        </div>
                    </div>
                @endif
                <div class="modal-footer" style="border-top:unset !important">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary"
                        wire:click.prevent="updateSelectedJadwal">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
