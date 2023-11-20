@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="row p-0 m-0">
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="card-body shadow h-100 overflow-auto">
                    @if (session('berhasil'))
                    <div class="alert alert-success">{{ session('berhasil') }}</div>
                    @endif
            
                    @if (session('gagal'))
                        <div class="alert alert-danger">{{ session('gagal') }}</div>
                    @endif
                    <span class="fs-5">Ganti Kata Sandi</span><hr>
                    <div class="row">
                        <div class="col">
                            <label class="fs-5">Email</label>
                        </div>
                        <div class="col">
                            <label class="fs-5">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" wire:model="email" class="form-control">
                            @error('email') <span>{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <input type="password" wire:model="password" class="form-control" id="password2">
                                @error('password') <span>{{ $message }}</span> @enderror
                                <span class="input-group-text" id="showPasswordToggle2"><i class="bi bi-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 text-end">
                        <div class="col">
                            <button wire:click="changePassword" type="button" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="card-body h-auto overflow-auto shadow">
                    <span class="fs-5">Data Diri</span><hr>
                    <form wire:submit.prevent="update" method="POST" class="fs-5">
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        @foreach ($akun as $data)
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>Nama</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" value="{{ $data->nama_guru }}" disabled>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>NIP</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="nama" class="form-control" value="{{ $data->nip }}" disabled>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>Jenis Kelamin</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <input id="jk" type="text" class="form-control" value="{{ $data->jenis_kelamin }}" disabled>
                                </div>
                            </div>
                    
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>Tempat, Tanggal Lahir</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="nama" class="form-control" value="{{ $data->tempat_lahir }}" disabled>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input type="date" name="tgl_lahir" id="tgl_lahir"  class="form-control" value="{{ $data->tanggal_lahir }}" disabled>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>Agama</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <input id="jk" type="text" class="form-control" value="{{ $data->agama }}" disabled>
                                </div>
                            </div>
                    
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>Nomor HP</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input wire:model="data.no_hp" id="nama" type="nama" class="form-control" value="{{ $data->no_hp }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>Provinsi</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <input wire:model="data.provinsi" id="provinsi" type="text" class="form-control" value="{{ $data->provinsi }}" oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                </div>
                            </div>
                    
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>Kota</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <input wire:model="data.kota" id="kota" type="text" class="form-control" value="{{ $data->kota }}" oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                </div>
                            </div>
                    
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>Desa</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                    <input wire:model="data.desa" id="desa" type="text" class="form-control" value="{{ $data->desa }}" oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                                </div>
                            </div>
                    
                            <div class="row mb-2 align-items-center">
                                <div class="col-3">
                                    <span>RT/RW</span>
                                </div>
                                <div class="col-auto">
                                    <span>:</span>
                                </div>
                                <div class="col-3">
                                        <div class="input-group">
                                            <input wire:model="data.rt" type="text" class="form-control" value="{{ $data->rt }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                </div>
                                <div class="col-3">
                                        <div class="input-group">
                                            <input wire:model="data.rw" type="text" class="form-control" value="{{ $data->rw }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                </div>
                            </div>
                    
                            @if (isset($data->alamat))
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <span>Alamat Lengkap</span>
                                    </div>
                                    <div class="col-auto">
                                        <span>:</span>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input wire:model="data.alamat" id="nama" type="nama" class="form-control" value="{{ $data->alamat }}">
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
                </div>
            </div>
        </div>
    </div>
</div>