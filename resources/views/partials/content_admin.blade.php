{{-- Beranda Admin --}}
<div class="col p-0 page active-page" id="BerandaAdmin">
    <div class="grid-tengah w-100 overflow-auto">
        <div class="row" style="margin-bottom: 20px">
            <div class="col">
                <span class="h1 fw-bold text-biru">Beranda</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        @livewire('data-admin')
    </div>
</div>