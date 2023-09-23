@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<form wire:submit.prevent="update" method="POST" action="{{ route('siswa.edit') }}">
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    
    @csrf
    <div class="row">
        <div class="col" style="margin-bottom: 20px">
            <div class="persegi">
                <p class="text-white m-0 fs-5 px-3" id="shadow">Ubah Data | Akun</p>
            </div>
        </div>
    </div>
    @foreach ($siswa2 as $item)
        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Nama</span>
            </div>
            <div class="col-3" style="width: 40%;">
                <div class="input-group">
                    <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->nama_siswa }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>NIS</span>
            </div>
            <div class="col-3" style="width: 40%;">
                <div class="input-group">
                    <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->nis }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Jenis Kelamin</span>
            </div>
            <div class="col-3" style="width: 40%;">
                <input id="jk" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->jenis_kelamin }}" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Tempat, Tanggal Lahir</span>
            </div>
            <div class="col-3" style="width: 40%;">
                <div class="input-group">
                    <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->tempat_lahir }}" readonly>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <input type="date" name="tgl_lahir" id="tgl_lahir"  class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->tanggal_lahir }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Agama</span>
            </div>
            <div class="col-3" style="width: 40%;">          
                <div class="input-group">
                    <input id="agama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->agama }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Provinsi</span>
            </div>
            <div class="col-3" style="width: 40%;">          
                <div class="input-group">
                    <input id="provinsi" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->provinsi }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Kota</span>
            </div>
            <div class="col-3" style="width: 40%;">          
                <div class="input-group">
                    <input id="kota" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->kota }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Desa</span>
            </div>
            <div class="col-3" style="width: 40%;">          
                <div class="input-group">
                    <input id="desa" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->desa }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>RT</span>
            </div>
            <div class="col-3" style="width: 40%;">          
                <div class="input-group">
                    <input id="rt" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->rt }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>RW</span>
            </div>
            <div class="col-3" style="width: 40%;">          
                <div class="input-group">
                    <input id="rw" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->rw }}" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>Nomor Telepon</span>
            </div>
            <div class="col-3" style="width: 40%;">          
                <div class="input-group">
                    <input wire:model="data.no_hp" id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $item->no_hp }}">
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-3" style="width: 30%;">
                <span>E-mail</span>
            </div>
            <div class="col-3" style="width: 40%;">
                @if ($siswa1)
                    <div class="input-group">
                        <input id="email" type="email" class="form-control" style="border-color: rgba(168, 168, 168, 1);" value="{{ $siswa1 }}" readonly>
                    </div>
                @endif
            </div>
        </div>
        
        @if (isset($item->alamat))
            <div class="row">
                <div class="col-3" style="width: 30%;">
                    <span>Alamat Lengkap</span>
                </div>
                <div class="col">
                    <div class="input-group" >
                        <textarea wire:model="data.alamat" name="alamat" id="alamat" cols="30" rows="10" class="form-control" style="border-color: rgba(168, 168, 168, 1); width: 50%;" value="{{ $item->alamat }}"></textarea>
                    </div>
                </div>
            </div>
        @else
            <p>Data alamat tidak tersedia.</p>
        @endif

    @endforeach
        <div class="col text-end mt-5">
            <button class="btn btn-primary" id="shadow" type="submit" style="position: relative; background-color: #16498c; border: #16498c;">Update Data</button>
        </div>
</form>