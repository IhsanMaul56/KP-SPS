@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="row">
    {{-- <div class="mb-3"> --}}
        <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1);">
    {{-- </div> --}}
    <div class="col-3" style="width: max-content;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertData">
            <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
        </button>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dagur as $index => $item)
                <tr>
                    <td>{{ $dagur->firstItem() + $index }}</td>
                    <td>{{ $item->nama_guru }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_hp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dagur->links() }}
</div>