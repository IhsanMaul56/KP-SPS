@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="card-body h-100 overflow-auto" id="shadow">

    <div class="row mb-1" style="display: flex; align-items: center; width: 75%;">
        <div class="col">
            <select wire:model="mapelSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 100px">
                <option value="" selected>Mata Pelajaran</option>
                @foreach ($guru as $mapel)
                    <option value="{{ $mapel->nama_mapel }}">{{ $mapel->nama_mapel }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select wire:model="tingkatSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 100px">
                <option value="" selected>Tingkat</option>
                @foreach ($tingkat as $ting)
                    <option value="{{ $ting->nama_tingkat }}">{{ $ting->nama_tingkat }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select wore:model="tingkatSelected" wire:model="kelasSelected" class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 100px">
                <option value="" selected>Kelas</option>
                @foreach ($kelas as $kel)
                    <option value="{{ $kel->nama_kelas }}">{{ $kel->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-3">
        @if (!$siswa->isEmpty())
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Nilai Akhir</th>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($siswa as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>0</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">Tidak ada hasil yang ditemukan.</p>
        @endif
    </div>
</div>
