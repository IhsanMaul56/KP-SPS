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
    <table class="table">
        <thead>
            <tr>
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
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ date('H:i', strtotime($item->waktu_masuk)) }} - {{ date('H:i', strtotime($item->waktu_keluar)) }}</td>
                    {{-- <td>{{ $item->waktu_masuk }} - {{ $item->waktu_keluar }}</td> --}}
                    @if ($pengampu)
                        @php
                            $matchingPengampu = $pengampu->firstWhere('kode_pengampu', $item->pengampu_id);
                        @endphp
                        @if ($matchingPengampu)
                            <td>{{ $matchingPengampu->nama_mapel }}</td>
                            <td>{{ $matchingPengampu->nama_guru }}</td>
                        @else
                            <td>Tidak Ditemukan</td>
                            <td>Tidak Ditemukan</td> <!-- Tambahkan pesan "Tidak Ditemukan" untuk nama_pengampu juga -->
                        @endif
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>