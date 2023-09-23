@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="row">
    <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1);">
    <div class="col-3" style="width: max-content;">
        <a href="{{ route('tambah-data-guru') }}" class="btn btn-primary" style="text-decoration:none">
            <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
        </a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dagur as $index => $item)
                <tr>
                    <td>{{ $dagur->firstItem() + $index }}</td>
                    <td></td>
                    <td>{{ $item->nama_guru }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dagur->links() }}
</div>