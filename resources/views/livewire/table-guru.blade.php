<div class="col">
    <h3 class="fs-5 mb-2">Jadwal Mengajar</h3>
    <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 100px">
    @if ($jadwal != null)    
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($jadwal as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ $item->waktu_masuk }} - {{ $item->waktu_keluar }}</td>
                        @if ($pengampu)
                            @php
                                // Cari data pengampu yang sesuai dengan pengampu_id pada jadwal
                                $matchingPengampu = $pengampu->firstWhere('kode_pengampu', $item->pengampu_id);
                            @endphp
                            @if ($matchingPengampu)
                                <td>{{ $matchingPengampu->nama_mapel }}</td>
                            @else
                                <td>Tidak Ditemukan</td>
                            @endif
                        @endif
                        <td>{{ $item->nama_tingkat }} {{ $item->nama_kelas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
    @else
        <p>Anda tidak mempunyai jadwal</p>
    @endif
    {{ $dagur->links() }}
</div>