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
                        <span class="h1 fw-bold text-biru">Tambah Siswa</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <form action="#" method="POST">
                        <div class="card-body overflow-auto h-100 fs-5">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>NIS</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan NIS">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Nama Lengkap</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nama Lengkap">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Tempat, Tanggal Lahir</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        @livewire('date-picker')
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Jenis Kelamin</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input type="radio" name="option" id="option1" value="Pria" class="me-2">
                                        <label for="option1" class="me-3">Pria</label>
                                        
                                        <input type="radio" name="option" id="option2" value="Wanita" class="me-2">
                                        <label for="option2" class="me-3">Wanita</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Agama</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Agama">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Nomor HP</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nomor HP" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Provinsi</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Provinsi">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Kota</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Kota">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Desa</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Desa">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>RT/RW</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RT">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan RW">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                
                            </div>
                            <div class="row mb-2" >
                                <div class="col-3">
                                    <span>Alamat Lengkap</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        {{-- <input id="nama" type="text" class="form-control" style=""> --}}
                                        <textarea name="alamat" class="form-control" cols="2" rows="2" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Alamat Lengkap"></textarea>
                                    </div>
                                </div>
                                <div class="col-3 text-end mt-5">
                                    <input type="submit" value="Simpan" class="btn btn-primary mt-5">
                                </div>
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
