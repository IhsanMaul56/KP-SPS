<div class="card-body h-100 overflow-auto">
    <div class="row mb-3">
        <div class="col-3" style="width: 200px">
            <div class="persegi">
                <p class="text-white m-0 fs-5 px-3">2022/2023 Ganjil</p>
            </div>
        </div>
        <div class="col">
            <div class="persegi2 m-0 px-3">
                <p class="text-white m-0 fs-5">{{ $tingkat }} {{ $kelas }}</p>
            </div>
        </div>
    </div>
    
    <div class="col">
        <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: 25%; border-color: rgba(168, 168, 168, 1); border-radius: 10px 10px 10px 10px">
    </div>
    <div class="my-3">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Guru Pengampu</th>
                    <th>Mata Pelajaran</th>
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
                        <td>
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