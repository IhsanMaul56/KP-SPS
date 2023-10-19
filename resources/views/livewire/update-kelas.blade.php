<div class="modal fade" id="UpdateKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Guru Untuk Wali Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
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
                            <label>Pilih Jurusan :</label>
                            <select wire:model="selectedKelas.jurusan_id" class="form-control">
                                <option value="">Jurusan</option>
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
                                <option value="">Tingkat</option>
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
                <div class="modal-footer">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="updateSelectedKelas">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
