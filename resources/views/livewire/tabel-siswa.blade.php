<div class="col-3" style="width: 200px">
    <div class="persegi">
        <p class="text-white m-0 fs-5">Semester Siswa</p>
    </div>
</div>
<div class="col">
    <div class="persegi2 m-0">
        <p class="text-white m-0 fs-5">{{ $kelas }}</p>
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
                    <td>{{ $item->waktu }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td>{{ $item->nama_pengampu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>