<div class="rightbar" id="rightbar2">
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
    <div class="row p-0 m-0">
        <div class="card-body h-100 overflow-auto" id="shadow">
            <div class="row m-0 p-0">
                <i class="bi bi-person-circle" style="text-align: center; font-size: 100px;"></i>
                @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (Auth::user()->siswa())
        <form wire:submit.prevent="updatedPhoto">
            <input wire:model="photo" type="file" wire:model="photo">
            
            @error('photo') <span class="error">{{ $message }}</span> @enderror

            <button type="submit">Upload Foto Profil</button>
        </form>
    @else
        <p>Anda tidak memiliki izin untuk mengunggah foto profil.</p>
    @endif

    @if (Auth::user()->profile_picture)
        <img src="{{ asset('storage/profile-pictures/' . Auth::user()->profile_picture) }}" alt="Foto Profil" width="100">
    @else
        <p>Foto profil belum diunggah.</p>
    @endif
            </div>
            <div class="row">
                <span class="fw-bold mb-2" style="text-align: center; font-size: 20px;">{{ Auth::user()->name }}</span>
                <span class="fw-bold" style="text-align: center; font-size: 20px;">{{ Auth::user()->email }}</span>
            </div>
        </div>
    </div>
</div>