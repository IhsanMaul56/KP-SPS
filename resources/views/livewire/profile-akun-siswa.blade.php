<div id="FotoSiswa">
    <div class="row mb-3">
        <div class="col fs-2 justify-content-end d-flex align-items-center">
            <i class="bi bi-person-circle"></i>
            <span class="fs-5 fw-bold ms-2" style="cursor: pointer" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->siswa_id }}</span>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#" id="btnPage6">Profil</a></li>
                <li><a class="dropdown-item" href="/logout">Keluar</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="card-body h-100 overflow-auto" id="shadow" style="z-index: 99">
            <div class="row m-0 p-0">
                <span>Foto Profil</span>
                <hr>
                @if ($foto->foto_siswa == "")
                    <i class="bi bi-person-circle" style="text-align: center; font-size: 100px;"></i>
                @else
                    <center>
                        <img src="{{ asset('storage/profile-pictures/'.$foto->foto_siswa) }}" alt="Foto Profil" width="250" class="rounded-circle mb-5">
                    </center>
                @endif

                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if (Auth::user()->siswa())
                    <form wire:submit.prevent="updatedPhoto">
                        <input wire:model="photo" type="file" wire:model="photo" class="input-group">
                        @error('photo') <span class="error">{{ $message }}</span> @enderror
                    </form>
                @else
                    <p>Anda tidak memiliki izin untuk mengunggah foto profil.</p>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>