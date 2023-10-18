@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <div class="container-fluid p-0">
        @include('partials.sidebar')
        <div class="col p-0">
            <div class="grid-tengah">
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Edit Guru</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <form wire:submit.prevent="update" method="POST" action="{{ route('tambah-data-guru') }}">
                        @csrf
                        @if (Session::has('berhasil'))
                            <div class="alert alert-success">
                                {{ Session::get('berhasil') }}
                            </div>
                        @endif
                        <div class="card p-0">
                            <div class="card-body overflow-auto h-100 fs-5">
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>NIP</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nip" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan NIP" wire:model="data.nip" name="nip"">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nama Lengkap</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama_guru" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nama Lengkap" wire:model="data.nama_guru" name="nama_guru">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Tempat, Tanggal Lahir</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="tempat_lahir" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Tempat Lahir" wire:model="data.tempat_lahir" name="tempat_lahir">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <label for="datepicker"></label>
                                            <input wire:model="data.tanggal_lahir" type="date" id="datepicker" class="form-control" name="tanggal_lahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Jenis Kelamin</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="radio" id="Laki-lai" value="Laki-laki" class="me-2" wire:model="data.jenis_kelamin" name="jenis_kelamin">
                                            <label for="Laki-laki" class="me-3">Laki-laki</label>
                                            
                                            <input type="radio" id="Perempuan" value="Perempuan" class="me-2" wire:model="data.jenis_kelamin" name="jenis_kelamin">
                                            <label for="Perempuan" class="me-3">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Agama</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="agama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Agama" wire:model="data.agama" name="agama">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nomor HP</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="no_hp" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nomor HP" oninput="this.value = this.value.replace(/[^0-9]/g, '')" wire:model="data.no_hp" name="no_hp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="email" type="email" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nomor Email" wire:model="data.email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Provinsi</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="provinsi" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Provinsi" wire:model="data.provinsi" name="provinsi">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Kota</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="kota" type="text" class="form-controlr" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Kota" wire:model="data.kota" name="kota">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Desa</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="desa" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Desa" wire:model="data.desa" name="desa">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>RT/RW</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="rt" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RT" wire:model="data.rt" name="rt">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="rw" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RW" wire:model="data.rw" name="rw">
                                        </div>
                                    </div>
                                </div>
                                <div class="row lg-2" >
                                    <div class="col-3">
                                        <span>Alamat Lengkap</span>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input id="alamat" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RW" wire:model="data.alamat" name="alamat">
                                        </div>
                                    </div>
                                    <div class="col-3 mt-5">
                                        
                                    </div>
                                </div>
                                <input type="submit" value="Simpan" class="btn btn-primary mt-5">
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </div>

    <div class="col p-0">
        <div class="grid-kanan">
            @include('partials.rightbar_admin')
        </div>
    </div>
</div>
@endsection
