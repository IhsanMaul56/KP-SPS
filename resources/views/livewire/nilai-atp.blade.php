<div class="col">
    <div class="card-body h-100 overflow-auto">
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
        <div class="col">
            <h3 class="fs-5 mb-2">Atur TP Untuk Kelulusan Mata Pelajaran</h3>
            <hr>
            <form wire:submit.prevent="createATP">
                <div class="fom-group">
                    <label>Tahun Ajaran :</label>
                    <select name="Mata Pelajaran" class="form-control mb-3">
                        <option value="" hidden selected>2022/2023</option>
                        @foreach ($akademikList as $kodeTahun => $tahunAkademik)
                            <option value="{{ $akademikList }}">{{ $tahunAkademik }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran:</label>
                    <select wire:model="selectedMapel" class="form-control mb-3">
                        <option value="" hidden selected>Nama Mapel</option>
                        @foreach ($mapelList as $namaMapel)
                            <option value="{{ $namaMapel }}">{{ $namaMapel }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Nama TP:</label>
                    <select name="nama_tp" wire:model="tp_id" class="form-control mb-3">
                        <option value="" hidden selected>Nama TP</option>
                        @foreach ($tpList as $kodeTP => $namaTP)
                            <option value="{{ $kodeTP }}">{{ $namaTP }}</option>
                        @endforeach
                    </select>
                </div>                

                <div class="form-group">
                    <label>Masukkan jumlah ATP :</label>
                    <div class="col">
                        <input type="text" wire:model="jumlah_atp" class="form-control" placeholder="Masukkan jumlah ATP">
                    </div>
                </div><br>

                <div class="form-group" id="tp-inputs">
                    @if ($jumlah_atp)
                        @for ($i = 1; $i <= $jumlah_atp; $i++)
                            <div class="form-group">
                                <label>ATP {{ $i }} :</label>
                                <input type="text" wire:model="nama_atp.{{ $i }}" name="nama_atp[]" class="form-control" placeholder="Masukkan TP">
                            </div><br>
                        @endfor
                    @endif
                </div><br><br>

                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
