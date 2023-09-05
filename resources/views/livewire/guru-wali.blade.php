<div class="col">
    <div class="persegi2 m-0">
        <p class="text-white m-0 fs-5">{{ $kelas }}</p>
    </div>
    <div class="my-3">
        @if ($dataSiswa != null)    
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($dataSiswa as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Anda tidak menjadi wali kelas</p>
        @endif
    </div>
</div>
