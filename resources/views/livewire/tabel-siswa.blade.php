<div class="card-body h-100 overflow-auto" id="shadow">
    <div class="row mb-3">
        <div class="col-auto">
            <div class="persegi">
                <p class="text-white m-0 fs-5 px-3">{{ $tahun }}</p>
            </div>
        </div>
        <div class="col">
            <div class="persegi2 m-0 px-3">
                <p class="text-white m-0 fs-5">{{ $tingkat }} {{ $kelas }}</p>
            </div>
        </div>
    </div>
    <div class="col">
        <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: max-content;">
    </div>
    <div class="my-3">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>HARI</th>
                    <th>WAKTU</th>
                    <th>NAMA GURU</th>
                    <th>MATA PELAJARAN</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                ?>
                @foreach ($jadwal as $item)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>
                            {{ substr($item->waktu_masuk, 0, 5) }} - {{ substr($item->waktu_keluar, 0, 5) }}
                        </td>
                        <td class="text-start">
                            @if ($item->nama_guru)
                                {{ $item->nama_guru }}
                            @endif
                        </td>
                        <td>
                            @if ($item->nama_mapel)
                                {{ $item->nama_mapel }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $jadwal->links() }}
    </div>
</div>