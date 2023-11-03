@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

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
            <form wire:submit.prevent="createTP">
                <div class="form-group">
                    <label>Tahun Ajaran :</label>
                    <select name="Mata Pelajaran" class="form-control mb-3">
                        <option value="" hidden selected>2022/2023</option>
                        @foreach ($akademikList as $kodeTahun => $tahunAkademik)
                            <option value="{{ $kodeTahun }}">{{ $tahunAkademik }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran :</label>
                    <select wire:model="mapel_id" name="Mata Pelajaran" class="form-control mb-3">
                        <option value="" hidden selected>Nama Mapel</option>
                        @foreach ($mapelList as $kodeMapel => $namaMapel)
                            <option value="{{ $kodeMapel }}">{{ $namaMapel }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Masukkan jumlah TP :</label>
                    <div class="col">
                        <input type="text" wire:model="jumlah_tp" class="form-control" placeholder="Masukkan jumlah TP">
                    </div>
                </div><br>

                <div class="form-group" id="tp-inputs">
                    @if ($jumlah_tp)
                        @for ($i = 1; $i <= $jumlah_tp; $i++)
                            <div class="form-group">
                                <label>TP {{ $i }} :</label>
                                <input type="text" wire:model="nama_tp.{{ $i }}" name="nama_tp[]"
                                    class="form-control" placeholder="Masukkan TP">
                            </div><br>
                        @endfor
                    @endif
                </div><br><br>

                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
