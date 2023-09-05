<div class="col">
    <h3>Data Siswa</h3>
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 25%; border-color: black;">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dasis->links() }}   
</div>