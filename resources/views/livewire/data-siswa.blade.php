<div class="row">
    <input type="text" class="form-control" wire:model="search" placeholder="Cari" style="width: 25%; border-color: black;">
    <div class="col-3" style="width: max-content;">
        <a href="{{ route('tambah-data-siswa') }}" class="btn btn-primary" style="text-decoration:none">
            <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
                <th>Aksi</th>
                <!-- Tambahkan kolom lain di sini -->
            </tr>
        </thead>
        <tbody>
            @foreach ($dasis as $index => $item)
                <tr>
                    <td>{{ $dasis->firstItem() + $index }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>
                        <a href="" class="btn btn-primary" style="text-decoration: none">Edit</a>
                        <a href="#" class="btn btn-danger" style="text-decoration: none">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dasis->links() }}  
</div>