<div class="col">
    <h3>Data Kelas</h3>
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 25%; border-color: black;">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kelas</th>
                <th>Nama Jurusan</th>
                <!-- Tambahkan kolom lain di sini -->
            </tr>
        </thead>
        <tbody>
            @foreach ($dakel as $index => $item)
                <tr>
                    <td>{{ $dakel->firstItem() + $index }}</td>
                    <td>{{ $item->nama_kelas}}</td>
                    <td>{{ $item->nama_jurusan}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dakel->links() }}   
</div>