@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="col">
    @include('livewire.update-aktivasi-penilaian')
    @include('livewire.delete-aktivasi-penilaian')
    <div class="row">
        <div class="col-auto">
            <div class="card-body h-auto">
                <h4 class="text-center">Atur Periode Penilaian</h4><hr>
                {{-- <form action=""> --}}
                    <div class="mb-3">
                        <label class="form-label">Nama Periode</label>
                        <select name="nama" wire:model="nama" class="form-select">
                            <option value="" hidden selected>Pilih</option>
                            <option value="input_nilai">Input Nilai</option>
                            <option value="pmb">PMB</option>
                            <option value="naik_kelas">Kenaikan Kelas</option>
                        </select>
                    </div>
                    <div class="mt-3 mb-4">
                        <label class="form-label">Tanggal Awal</label>
                        <input type="datetime-local" class="form-control" wire:model='start_date'>
                    </div>
                    <div class="mt-3 mb-4">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="datetime-local" class="form-control" wire:model='end_date'>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Simpan" class="btn btn-primary insert-data" wire:click='insertData'>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
        <div class="col">
            <div class="card-body h-auto">
                <h4>Riwayat Tanggal Aktivasi Semester Ganjil & Genap</h4><hr>
                @if (Session::has('berhasil'))
                    <div class="alert alert-success">
                        {{ Session::get('berhasil') }}
                    </div>
                @elseif (Session::has('gagal'))
                    <div class="alert alert-danger">
                        {{ Session::get('gagal') }}
                    </div>
                @endif
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periode as $item)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords(implode(" ", explode("_", $item->nama))) }}</td>
                                <td>{{ $item->tahun_akademik }}</td>
                                <td>{{ $item->nama_semester }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#UpdatePeriode" wire:click='editData({{ $item->id }})'>
                                        <i class="bi bi-pencil-square text-white"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeletePeriode" wire:click="selectDelete('{{ $item->id }}')">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>