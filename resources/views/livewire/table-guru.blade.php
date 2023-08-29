<div class="col">
    <h3>Data Guru</h3>
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Cari Jadwal">
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