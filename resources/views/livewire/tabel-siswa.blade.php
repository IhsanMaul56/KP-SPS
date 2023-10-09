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
<div class="my-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Mata Pelajaran</th>
                <th>Nama Guru</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($jadwal as $item)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->hari }}</td>
                    {{-- <td>{{ $item->waktu_masuk }} - {{ $item->waktu_keluar }}</td> --}}
                    <td>
                        {{ substr($item->waktu_masuk, 0, 5) }} - {{ substr($item->waktu_keluar, 0, 5) }}
                    </td>
                    @if ($pengampu)
                        @php
                            $searchGuru = $pengampu->firstWhere('kode_pengampu', $item->pengampu_id);
                        @endphp
                        @if ($searchGuru)
                            <td class="text-start">{{ $searchGuru->nama_guru }}</td>
                            <td class="text-start">{{ $searchGuru->nama_mapel }}</td>
                        @else
                            <td>Data Tidak Ditemukan</td>
                        @endif
                    @endif
                </tr>
            @endforeach
                <tr class="text-center">
                    
                </tr>
        </tbody>
    </table>
</div>