<div class="col mt-3">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 50%; border-color: black;">
        </div>
        <div class="col">
            <span class="btn btn-primary" id="btnTambahGuru"><i class="bi bi-person-add p-1"></i>Tambah Data</span>
        </div>
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

