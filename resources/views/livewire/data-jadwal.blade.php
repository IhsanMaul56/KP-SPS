@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Nama Mapel</th>
                    <th>Kelas</th>
                    <th>hari</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($jadwal as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        @if ($pengampu)
                            @php
                                // Filter the $pengampu array to find matching records based on pengampu_id
                                $matchingPengampus = $pengampu->where('kode_pengampu', $item->pengampu_id);
                            @endphp
                            @if ($matchingPengampus->isNotEmpty())
                                <td>
                                    @foreach ($matchingPengampus as $matchingPengampu)
                                        {{ $matchingPengampu->nama_guru }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($matchingPengampus as $matchingPengampu)
                                        {{ $matchingPengampu->nama_mapel }}<br>
                                    @endforeach
                                </td>
                            @else
                                <td>Tidak Ditemukan</td>
                                <td>Tidak Ditemukan</td>
                            @endif
                        @endif
                        <td>{{ $item->nama_tingkat }} {{ $item->nama_kelas }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ $item->waktu_masuk }} - {{ $item->waktu_keluar }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $dataJadwal->links() }}
    </div>
