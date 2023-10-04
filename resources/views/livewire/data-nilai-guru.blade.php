<div class="card-body h-100 overflow-auto" id="shadow">
    <div class="row mb-1" style="display: flex; align-items: center; width: 75%;">
        <div class="col">
            <select wire:model="mapelSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 10px 10px 10px 10px">
                <option value="" selected>Mata Pelajaran</option>
                @foreach ($guru as $mapel)
                    <option value="{{ $mapel->nama_mapel }}">{{ $mapel->nama_mapel }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select wire:model="tingkatSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 10px 10px 10px 10px">
                <option value="" selected>Tingkat</option>
                @if ($tingkat)
                    @foreach ($tingkat as $ting)
                        <option value="{{ $ting }}">{{ $ting }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col">
            <select wire:model="kelasSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 10px 10px 10px 10px">
                <option value="" selected>Kelas</option>
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
            <table class="table table-bordered">
                <thead class="text-center">
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Nilai Akhir</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($siswa as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nis }}</td>
                            <td class="text-start">{{ $item->nama_siswa }}</td>
                            <td>0</td>
                            <td>
                                <a href="{{ route('tambah-nilai-siswa') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i></a>
                                <button class="btn btn-warning"><i class="bi bi-pencil-square text-white"></i></button>
                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <hr>
            <div class="col text-center">
                <img src="{{URL::asset('/img/warning.png')}}" alt="warning" width="125px;">
                <p class="mt-2">Tidak Ada Hasil Yang Ditemukan</p>
            </div>
        @endif
    </div>
</div>
