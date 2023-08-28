<div class="col">
    <h3>Jadwal Mengajar</h3>
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Cari Jadwal">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <!-- Tambahkan kolom lain di sini -->
            </tr>
        </thead>
        <tbody>
            @foreach ($dagur as $item)
                <tr>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama_guru }}</td>
                    
                    <!-- Tambahkan kolom lain di sini -->
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dagur->links() }}   
</div>