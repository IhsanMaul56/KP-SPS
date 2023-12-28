<div class="modal fade" id="InsertPredikat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">ATUR PREDIKAT NILAI</h5>
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

                @if (Session::has('salah'))
                    <div class="alert alert-danger">
                        {{ Session::get('salah') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <label for="pengampu_id">Mata Pelajaran:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select wire:model="pengampu_id" name="pengampu_id" class="form-select" wire:change="fetchPredikat">
                            <option value="" hidden selected>Pilih Mata Pelajaran</option>
                            @foreach ($mapelList as $kodePengampu => $namaMapel)
                                <option value="{{ $kodePengampu }}">{{ $namaMapel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="nilai_a">Nilai Minimal A:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control @error('nilai_a') is-invalid @enderror" wire:model="nilai_a" name="nilai_a" placeholder="Masukkan Persentase Nilai Formatif">
                        @error('nilai_a')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="nilai_b">Nilai Minimal B</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control @error('nilai_b') is-invalid @enderror" wire:model="nilai_b" name="nilai_b" placeholder="Masukkan Persentase UTS">
                        @error('nilai_b')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="nilai_c">Nilai Minimal C</label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" class="form-control @error('nilai_c') is-invalid @enderror" wire:model="nilai_c" name="nilai_c" placeholder="Masukkan Persentase UAS">
                        @error('nilai_c')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="nilai_d">Nilai Minimal D</label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" class="form-control @error('nilai_d') is-invalid @enderror" wire:model="nilai_d" name="nilai_d" placeholder="Masukkan Persentase UAS">
                        @error('nilai_d')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: unset">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click="insertPredikat">Simpan</button>
            </div>
        </div>
    </div>
</div>