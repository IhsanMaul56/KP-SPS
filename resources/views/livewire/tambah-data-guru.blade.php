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
                        <span class="h1 fw-bold text-biru">Tambah Guru</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <form wire:submit.prevent="store" method="POST" action="{{ route('tambah-data-guru') }}">
                        @csrf
                        @if (Session::has('berhasil'))
                            <div class="alert alert-success">
                                {{ Session::get('berhasil') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
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
                                            <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan NIP" wire:model="nip" name="nip">
                                            @error('nip')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nama Lengkap</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama_guru" type="text" class="form-control @error('nama_guru') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nama Lengkap" wire:model="nama_guru" name="nama_guru">
                                            @error('nama_guru')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Tempat, Tanggal Lahir</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Tempat Lahir" wire:model="tempat_lahir" name="tempat_lahir">
                                            @error('tempat_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <label for="datepicker"></label>
                                            <input wire:model="tanggal_lahir" type="date" id="datepicker" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Jenis Kelamin</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input type="radio" id="Laki-lai" value="Laki-laki" class="me-2" wire:model="jenis_kelamin" name="jenis_kelamin">
                                            <label for="Laki-laki" class="me-3">Laki-laki</label>
                                            
                                            <input type="radio" id="Perempuan" value="Perempuan" class="me-2" wire:model="jenis_kelamin" name="jenis_kelamin">
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
                                            <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Agama" wire:model="agama" name="agama">
                                            @error('agama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nomor HP</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nomor HP" oninput="this.value = this.value.replace(/[^0-9]/g, '')" wire:model="no_hp" name="no_hp">
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nomor Email" wire:model="email" name="email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Provinsi</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Provinsi" wire:model="provinsi" name="provinsi">
                                            @error('provinsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Kota</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Kota" wire:model="kota" name="kota">
                                            @error('kota')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Desa</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="desa" type="text" class="form-control @error('desa') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Desa" wire:model="desa" name="desa">
                                            @error('desa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>RT/RW</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="rt" type="text" class="form-control @error('rt') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RT" wire:model="rt" name="rt">
                                            @error('rt')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="rw" type="text" class="form-control @error('rw') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RW" wire:model="rw" name="rw">
                                            @error('rw')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row lg-2" >
                                    <div class="col-3">
                                        <span>Alamat Lengkap</span>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RW" wire:model="alamat" name="alamat">
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
