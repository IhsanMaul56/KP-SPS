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

    <div class="row">
        <div class="col" style="margin-bottom: 20px">
            <div class="persegi">
                <p class="text-white m-0 fs-5">Ubah Data | Akun</p>
            </div>
        </div>
    </div>
    @foreach ($akun as $data) 
        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Nama</span>
            </div>
            <div class="col-3" style="width: 40%;">
                <div class="input-group">
                    <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->nama_guru }}" disabled>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>NIP</span>
            </div>
            <div class="col-3" style="width: 40%;">
                <div class="input-group">
                    <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->nip }}" disabled>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Jenis Kelamin</span>
            </div>
            <div class="col-3" style="width: 40%;">
                <input id="jk" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->jenis_kelamin }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Tempat, Tanggal Lahir</span>
            </div>
            <div class="col-3" style="width: 40%;">
                <div class="input-group">
                    <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->tempat_lahir }}">
                </div>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <input type="date" name="tgl_lahir" id="tgl_lahir"  class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->tanggal_lahir }}">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Telepon/HP</span>
            </div>
            <div class="col-3" style="width: 40%;">
                <div class="input-group">
                    <input wire:model="data.no_hp" id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->no_hp }}">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>E-mail</span>
            </div>
            <div class="col-3" style="width: 40%;">
                @if ($guru)
                    <div class="input-group">
                        <input id="email" type="email" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $guru }}" disabled>
                    </div>
                @endif
            </div>
        </div>

        @if (isset($data->alamat))
            <div class="row">
                <div class="col-3" style="width: 30%;">
                    <span>Alamat Lengkap</span>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input wire:model="data.alamat" id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $data->no_hp }}">
                    </div>
                </div>
            </div>
        @else
            <p>Data alamat tidak tersedia.</p>
        @endif
    @endforeach
    <div class="row mt-5">
        <div class="col text-end">
            <button class="simpan-data fw-bold" id="shadow" type="submit">Simpan Data</button>
        </div>
    </div>
</form>