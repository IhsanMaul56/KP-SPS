@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

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
        <div class="card-body shadow h-100 overflow-auto">
            <span class="fs-5">Data Diri</span><hr>
            <form wire:submit.prevent="update" method="POST" action="{{ route('siswa.edit') }}" class="fs-5">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                
                @csrf
                @foreach ($siswa2 as $item)
                    <div class="row mb-2 align-items-center">
                        <div class="col-3">
                            <span>Nama</span>
                        </div>
                        <div class="col-auto">
                            <span>:</span>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <input id="nama" type="text" class="form-control" value="{{ $item->nama_siswa }}" disabled>
                            </div>
                        </div>
                    </div>
            
                    <div class="row mb-2 align-items-center">
                        <div class="col-3">
                            <span>NIS</span>
                        </div>
                        <div class="col-auto">
                            <span>:</span>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" value="{{ $item->nis }}" disabled>
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
                            <input id="jk" type="text" class="form-control" value="{{ $item->jenis_kelamin }}" disabled>
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
                                <input id="nama" type="nama" class="form-control" value="{{ $item->tempat_lahir }}" disabled>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <input type="date" name="tgl_lahir" id="tgl_lahir"  class="form-control" value="{{ $item->tanggal_lahir }}" disabled>
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
                            <div class="input-group">
                                <input id="agama" type="text" class="form-control" value="{{ $item->agama }}" disabled>
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
                            <div class="input-group">
                                <input id="provinsi" type="text" class="form-control" value="{{ $item->provinsi }}" oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                            </div>
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
                            <div class="input-group">
                                <input id="kota" type="text" class="form-control" value="{{ $item->kota }}" oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                            </div>
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
                            <div class="input-group">
                                <input id="desa" type="text" class="form-control" value="{{ $item->desa }}" oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')">
                            </div>
                        </div>
                    </div>
            
                    <div class="row mb-2 align-items-center">
                        <div class="col-3">
                            <span>RT</span>
                        </div>
                        <div class="col-auto">
                            <span>:</span>
                        </div>
                        <div class="col-3">          
                            <div class="input-group">
                                <input id="rt" type="text" class="form-control" value="{{ $item->rt }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                    </div>
            
                    <div class="row mb-2 align-items-center">
                        <div class="col-3">
                            <span>RW</span>
                        </div>
                        <div class="col-auto">
                            <span>:</span>
                        </div>
                        <div class="col-3">          
                            <div class="input-group">
                                <input id="rw" type="text" class="form-control" value="{{ $item->rw }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                    </div>
            
                    <div class="row mb-2 align-items-center">
                        <div class="col-3">
                            <span>Nomor Telepon</span>
                        </div>
                        <div class="col-auto">
                            <span>:</span>
                        </div>
                        <div class="col-3">          
                            <div class="input-group">
                                <input wire:model="data.no_hp" id="nama" type="text" class="form-control" value="{{ $item->no_hp }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-2 align-items-center">
                        <div class="col-3">
                            <span>E-mail</span>
                        </div>
                        <div class="col-auto">
                            <span>:</span>
                        </div>
                        <div class="col-3">
                            @if ($siswa1)
                                <div class="input-group">
                                    <input id="email" type="email" class="form-control" value="{{ $siswa1 }}" disabled>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    @if (isset($item->alamat))
                        <div class="row align-items-center">
                            <div class="col-3">
                                <span>Alamat Lengkap</span>
                            </div>
                            <div class="col-auto">
                                <span>:</span>
                            </div>
                            <div class="col">
                                <div class="input-group" >
                                    <textarea wire:model="data.alamat" name="alamat" id="alamat" cols="10" rows="2" class="form-control" style="width: 50%;" value="{{ $item->alamat }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col text-end mt-3">
                            <button class="btn btn-primary" id="shadow" type="submit" style="position: relative; background-color: #16498c; border: #16498c;">Update Data</button>
                        </div>
                    @else
                        <p>Data alamat tidak tersedia.</p>
                    @endif
            
                @endforeach
            </form>
        </div>
    </div>
</div>