<div class="card-body h-100 overflow-auto" id="shadow">
    <div class="col">
        <h3 class="fs-5 mb-2">Jadwal Mengajar</h3>
        <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 10px 10px 10px 10px;">
        @if ($jadwal != null)    
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>MATA PELAJARAN</th>
                        <th>HARI</th>
                        <th>WAKTU</th>
                        <th>KELAS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($jadwal as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td class="text-start">
                                @if ($item->nama_mapel)
                                    {{ $item->nama_mapel }}
                                @endif
                            </td>
                            <td>{{ $item->hari }}</td>
                            <td>
                                {{ substr($item->waktu_masuk, 0, 5) }} - {{ substr($item->waktu_keluar, 0, 5) }}
                            </td>
                            <td>{{ $item->nama_tingkat }} {{ $item->nama_kelas }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        @else
            <p>Anda tidak mempunyai jadwal</p>
        @endif
        {{ $jadwal->links() }}
    </div>
</div>