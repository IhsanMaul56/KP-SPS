<div class="col">
    <h3>Data Jurusan</h3>
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="search" placeholder="Search" style="width: 25%; border-color: black;">
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Jurusan</th>
                <th>Kepala Jurusan</th>
                <!-- Tambahkan kolom lain di sini -->
            </tr>
        </thead>
        <tbody>
            @foreach ($dajur as $index => $item)
                <tr>
                    <td>{{ $dajur->firstItem() + $index }}</td>
                    <td>{{ $item->nama_jurusan}}</td>
                    <td>{{ $item->nama_guru}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dajur->links() }}   
</div>