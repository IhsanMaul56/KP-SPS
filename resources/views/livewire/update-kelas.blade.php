<div class="modal fade" id="UpdateKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">EDIT KELAS</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col">
                            <label>Pilih Jurusan :</label>
                            <select wire:model="selectedKelas.jurusan_id" class="form-control">
                                <option value="" hidden selected>Jurusan</option>
                                @foreach ($jurusanList as $kodeJurusan => $namaJurusan)
                                    <option value="{{ $kodeJurusan }}">{{ $namaJurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>Pilih Tingkat :</label>
                            <select wire:model="selectedKelas.tingkat_id" class="form-control">
                                <option value="" hidden selected>Tingkat</option>
                                @foreach ($tingkatList as $kodeTingkat => $namaTingkat)
                                    <option value="{{ $kodeTingkat }}">{{ $namaTingkat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                
                    <div class="row mb-3">
                        <div class="col">
                            <label>Nama Kelas :</label>
                            <input wire:model="selectedKelas.nama_kelas" type="text" class="form-control" placeholder="Masukan nama kelas" value="{{ $nama_kelas }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: unset">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="updateSelectedKelas">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
