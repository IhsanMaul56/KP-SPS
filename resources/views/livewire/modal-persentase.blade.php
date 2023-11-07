<div class="modal fade" id="InsertPercent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">ATUR PERSENTASE NILAI</h5>
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
                <div class="row">
                    <div class="col">
                        <label for="pengampu_id">Mata Pelajaran:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select wire:model="pengampu_id" name="pengampu_id" class="form-control" wire:change="fetchMapelData">
                            <option value="" hidden selected>Pilih Mata Pelajaran</option>
                            @foreach ($mapelList as $kodePengampu => $namaMapel)
                                <option value="{{ $kodePengampu }}">{{ $namaMapel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="formatif_akhir">Nilai Formatif:</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control @error('formatif_akhir') is-invalid @enderror" wire:model="formatif_akhir" name="formatif_akhir" placeholder="Persentase Nilai Formatif">
                        @error('formatif_akhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="sumatif_uts">Nilai Sumatif (UTS):</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control @error('sumatif_uts') is-invalid @enderror" wire:model="sumatif_uts" name="sumatif_uts" placeholder="Persentase UTS">
                        @error('sumatif_uts')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="sumatif_uas">Nilai Sumatif (UAS):</label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" class="form-control @error('sumatif_uas') is-invalid @enderror" wire:model="sumatif_uas" name="sumatif_uas" placeholder="Persentase UAS">
                        @error('sumatif_uas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top: unset">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" wire:click="insertBobot">Simpan</button>
            </div>
        </div>
    </div>
</div>
