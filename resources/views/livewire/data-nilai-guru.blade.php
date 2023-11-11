<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.modal-persentase')
    <div class="row mb-1 align-items-center" style="display: flex; align-items: center; width: 75%;">
        <div class="col">
            <select wire:model="mapelSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 100px">
                <option value="" hidden selected>Mata Pelajaran</option>
                @foreach ($guru as $pengampu)
                    <option value="{{ $pengampu->nama_mapel }}">{{ $pengampu->nama_mapel }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <select wire:model="tingkatSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 200px; border-radius: 100px">
                <option value="" hidden selected>Tingkat</option>
                @if ($tingkat)
                    @foreach ($tingkat as $ting)
                        <option value="{{ $ting }}">{{ $ting }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col">
            <select wire:model="kelasSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 200px; border-radius: 100px">
                <option value="" hidden selected>Kelas</option>
                @if ($kelas)
                    @foreach ($kelas as $kel)
                        <option value="{{ $kel }}">{{ $kel }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertPercent">
                <i class="bi bi-percent" style="padding-right:5px;"></i>Atur Persentase
            </button>
        </div>
    </div>

    <div class="col mt-3">
        @if ($siswa && !$siswa->isEmpty())
            <div>
                <div class="row mb-3 mt-3">
                    <label for="">File Exel</label>
                    <div class="col">
                        <input type="file" class="form-control @error('file') is-invalid @enderror" wire:model="file">
                        <small>Note<b class="text-danger">*</b> : file harus bertipe .xlsx atau .xls</small>
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary" wire:click="importExcel">IMPORT</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success" wire:click="downloadExcel">Download Exel</button>
                    </div>
                </div>
            </div>
            @if (Session::has('berhasil_import') && !Session::has('error'))
                <div class="alert alert-success">
                    {{ Session::get('berhasil_import') }}
                </div>

            @elseif (Session::has('error') && !Session::has('berasil_import'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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