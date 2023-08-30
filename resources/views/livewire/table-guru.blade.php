<div class="col">
    <h3 class="fs-5 mb-2">Jadwal Mengajar</h3>
    <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 100px">
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