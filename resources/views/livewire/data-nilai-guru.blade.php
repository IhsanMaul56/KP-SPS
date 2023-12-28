<div class="card-body h-100 overflow-auto" id="shadow">
    @include('livewire.modal-persentase')
    @include('livewire.modal-predikat')
    <div class="row">
        <div class="col">
            @if (Session::has('berhasil'))
                <div class="alert alert-success">
                    {{ Session::get('berhasil') }}
                </div>
            @endif
        </div>
    </div>
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
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#InsertPredikat">
                <i class="bi bi-percent" style="padding-right:5px;"></i>Atur Predikat
            </button>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertPercent">
                <i class="bi bi-percent" style="padding-right:5px;"></i>Atur Persentase
            </button>
        </div>
    </div>

    <div class="col mt-3">
        @if ($siswa && !$siswa->isEmpty())
            @if (Session::has('berhasil_import') && !Session::has('error'))
                <div class="alert alert-success">
                    {{ Session::get('berhasil_import') }}
                </div>

            {{-- @elseif (Session::has('error') && !Session::has('berasil_import'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div> --}}
            @endif

            

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                </div>
            @endif --}}
            <hr>
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
            <div class="row">
                <div class="col form-control" style="margin-left: 12px; margin-right: 12px;">
                    <div class="row">
                        <label for="" class="mb-2 fs-5">File Excel</label>
                        <div class="col">
                            <input type="file" class="form-control mb-1 @error('file') is-invalid @enderror" wire:model="file">
                            <b class="text-danger">*</b><small style="color: grey">Note: File Harus Bertipe .xlsx atau .xls</small>
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" wire:click="importExcel"><i class="bi-cloud-upload" style="padding-right: 5px"></i>Import</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-success" wire:click="downloadExcel"><i class="bi-cloud-download" style="padding-right: 5px"></i>Excel</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="col text-center">
            <hr>
            <img src="{{URL::asset('/img/warning.png')}}" alt="warning" class="mb-3" width="125px;">
            <p>Mohon Atur Persentase Terlebih Dahulu</p>
        </div>
        @endif
    </div>
</div>