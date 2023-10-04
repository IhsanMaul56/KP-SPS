@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<form wire:submit.prevent="update" method="POST">
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif
    @foreach ($akun as $data) 
        <div class="row mb-2">
            <div class="col-3">
                <span>Nama</span>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->nama_guru }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-3">
                <span>NIP</span>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->nip }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-3">
                <span>Jenis Kelamin</span>
            </div>
            <div class="col-3">
                <input id="jk" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->jenis_kelamin }}" readonly>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-3">
                <span>Tempat, Tanggal Lahir</span>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->tempat_lahir }}" readonly>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <input type="date" name="tgl_lahir" id="tgl_lahir"  class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->tanggal_lahir }}" readonlyz>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-3">
                <span>Agama</span>
            </div>
            <div class="col-3">
                <input id="jk" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->agama }}" readonly>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-3">
                <span>Nomor HP</span>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <input wire:model="data.no_hp" id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->no_hp }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-3">
                <span>Provinsi</span>
            </div>
            <div class="col-3">
                <input wire:model="data.provinsi" id="provinsi" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->provinsi }}">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-3">
                <span>Kota</span>
            </div>
            <div class="col-3">
                <input wire:model="data.kota" id="kota" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->kota }}">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-3">
                <span>Desa</span>
            </div>
            <div class="col-3">
                <input wire:model="data.desa" id="desa" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->desa }}">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-3">
                <span>RT/RW</span>
            </div>
            <div class="col-3">
                    <div class="input-group">
                        <input wire:model="data.rt" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->rt }}">
                    </div>
            </div>
            <div class="col-3">
                    <div class="input-group">
                        <input wire:model="data.rw" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->rw }}">
                    </div>
            </div>
        </div>

        @if (isset($data->alamat))
            <div class="row">
                <div class="col-3">
                    <span>Alamat Lengkap</span>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input wire:model="data.alamat" id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->alamat }}">
                    </div>
                </div>
            </div>
        @else
            <p>Data alamat tidak tersedia.</p>
        @endif
    @endforeach

    <div class="col text-end mt-5">
        <button class="btn btn-primary" id="shadow" type="submit" style="position: relative; background-color: #16498c; border: #16498c; border-radius: 10px 10px 10px 10px">Update Data</button>

    </div>
</form>