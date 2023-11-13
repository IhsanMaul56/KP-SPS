<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.modal-persentase')

    <div class="row mb-1" style="display: flex; align-items: center;">
        <div class="col-2">
            <select wire:model="mapelSelected" class="form-select">
                <option value="" hidden selected>Pilih Mata Pelajaran</option>
                @foreach ($guru as $pengampu)
                    <option value="{{ $pengampu->nama_mapel }}">{{ $pengampu->nama_mapel }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-2">
            <select wire:model="tingkatSelected" class="form-select">
                <option value="" hidden selected>Pilih Tingkat</option>
                @if ($tingkat)
                    @foreach ($tingkat as $ting)
                        <option value="{{ $ting }}">{{ $ting }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-2">
            <select wire:model="kelasSelected" class="form-select">
                <option value="" hidden selected>Pilih Kelas</option>
                @if ($kelas)
                    @foreach ($kelas as $kel)
                        <option value="{{ $kel }}">{{ $kel }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertPercent">
                <i class="bi bi-percent" style="padding-right:5px;"></i>Atur Persentase
            </button>
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
                            <td>{{ $item->nilai_akhir }}</td>
                            <td>
                                <a href="{{ route('tambah-nilai-siswa', ['nis' => $item->nis, 'mapel_id' => $item->mapel_id]) }}" class="btn btn-primary" style="text-decoration: none;"><i class="bi bi-plus-lg"></i></a>
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