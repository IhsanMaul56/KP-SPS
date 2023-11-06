{{-- Beranda Kurikulum --}}
<div class="col p-0 page active-page" id="BerandaKurikulum">
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
        <div class="row p-0 m-0" style="display: flex; justify-content: space-between;">
            @livewire('data-kurikulum')
        </div>
    </div>
</div>