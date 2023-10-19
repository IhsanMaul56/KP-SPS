<div class="card-body h-100 overflow-auto" id="shadow">
    <div class="row mb-1" style="display: flex; align-items: center; width: 75%;">
        <div class="col">
            <select wire:model="mapelSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 100px">
                <option value="" hidden selected>Mata Pelajaran</option>
                @foreach ($guru as $mapel)
                    <option value="{{ $mapel->nama_mapel }}">{{ $mapel->nama_mapel }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select wire:model="tingkatSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 100px">
                <option value="" hidden selected>Tingkat</option>
                @if ($tingkat)
                    @foreach ($tingkat as $ting)
                        <option value="{{ $ting }}">{{ $ting }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col">
            <select wire:model="kelasSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 100px">
                <option value="" hidden selected>Kelas</option>
                @if ($kelas)
                    @foreach ($kelas as $kel)
                        <option value="{{ $kel }}">{{ $kel }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col mt-3">
        @if ($siswa && !$siswa->isEmpty())
            <table class="table table-bordered text-center">
                <thead>
                    <th>NO</th>
                    <th>NIS</th>
                    <th>NAMA SISWA</th>
                    <th>NILAI AKHIR</th>
                    <th>AKSI</th>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($siswa as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nis }}</td>
                            <td class="text-start">{{ $item->nama_siswa }}</td>
                            <td>0</td>
                            <td>
                                <a href="{{ route('tambah-nilai-siswa') }}" class="btn btn-primary" style="text-decoration: none;"><i class="bi bi-plus-lg"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="col text-center">
            <hr>
            <img src="{{URL::asset('/img/warning.png')}}" alt="warning" class="mb-3" width="125px;">
            <p>Tidak Ada Hasil Yang Ditemukan</p>
        </div>
        @endif
    </div>
</div>