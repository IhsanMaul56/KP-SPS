<div class="rightbar" id="rightguru2">
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
        <div class="card-body h-100 overflow-auto" id="shadow">
            <div class="row m-0 p-0">
                    @if ($fotos->foto_guru == "")
                        <i class="bi bi-person-circle" style="text-align: center; font-size: 100px;"></i>
                    @else
                        <center>
                            <img src="{{ asset('storage/profile-pictures/'.$fotos->foto_guru) }}" alt="Foto Profil" width="250" class="rounded-circle mb-5">
                        </center>    
                    @endif

                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if (Auth::user()->guru())
                        <form wire:submit.prevent="updatedPhoto()">
                            <input wire:model="photo" type="file" class="input-group">
                            @error('photo') <span class="error">{{ $message }}</span> @enderror
                        </form>
                    @else
                        <p>Anda tidak memiliki izin untuk mengunggah foto profil.</p>
                    @endif
            </div>
            <div class="row">
                <span class="fw-bold mb-2" style="text-align: center; font-size: 20px;">{{ Auth::user()->name }}</span>
                <span class="fw-bold" style="text-align: center; font-size: 20px;">{{ Auth::user()->email }}</span>
            </div>
        </div>
    </div>
</div>