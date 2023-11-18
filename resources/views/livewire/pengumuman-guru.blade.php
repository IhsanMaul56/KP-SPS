@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush
<div class="row p-0 m-0">
    <div class="col">
        <div class="card-body h-100 overflow-auto" id="shadow">
            <div class="row">
                <div class="col text-center">
                    <h4>Tambah Pengumuman Siswa</h4><hr>
                    {{-- <form method="post" action="{{ route('create-pengumuman') }}" wire:submit.prevent="createPengumuman"> --}}
                        {{-- @csrf --}}
                        <input type="hidden" wire:model="guru_id" name="guru_id" value="{{ $guru_id }}">
                        @if (Session::has('berhasil'))
                            <div class="alert alert-success">
                                {{ Session::get('berhasil') }}
                            </div>
                        @endif

                        @if (Session::has('gagal'))
                            <div class="alert alert-danger">
                                {{ Session::get('gagal') }}
                            </div>
                        @endif

                        <div class="row mb-3">
                            <div class="col">
                                <select wire:model="tingkat_id" name="tingkat_id" id="" class="form-select @error('tingkat_id') is-invalid @enderror">
                                    @error('tingkat_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <option value="" hidden selected>Pilih Tingkat</option>
                                    @foreach ($tingkatList as $tingkatId => $namaTingkat)
                                        <option value="{{ $tingkatId }}">{{ $namaTingkat }}</option>
                                    @endforeach
                                </select>
                                @error('tingkat_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col">
                                <select wire:model="kelas_id" name="kelas_id" id="" class="form-select @error('kelas_id') is-invalid @enderror">
                                    <option value="" hidden selected>Pilih Kelas</option>
                                    @foreach ($kelasList as $kelasId => $namaKelas)
                                        <option value="{{ $kelasId }}">{{ $namaKelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col">
                                <select wire:model="mapel_id" name="mapel_id" id="" class="form-select @error('mapel_id') is-invalid @enderror">
                                    <option value="" hidden selected>Pilih Mapel</option>
                                    @foreach ($mapelList as $mapelId => $namaMapel)
                                        <option value="{{ $mapelId }}">{{ $namaMapel }}</option>
                                    @endforeach
                                </select>
                                @error('mapel_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-start">
                                <textarea wire:model="deskripsi" id="summernote" name="deskripsi" class="form-select @error('deskripsi') is-invalid @enderror"></textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-end">
                                <button wire:click="createPengumuman" type="submit" class="btn btn-primary mt-3">Kirim</button>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card-body h-100 overflow-auto shadow">
            @include('livewire.delete-pengumuman')
            @if ($pengumumanList->isEmpty())
                <div class="row m-0 p-0 mb-3">
                    <img src="{{URL::asset('/img/no-data.png')}}" alt="clipboard" width="150px"><br>
                    <span class="fs-5" style="text-align: center; color: grey;">Tidak Ada Pengumuman Saat Ini</span>
                </div>
            @else
                <div class="row">
                    <div class="col text-center">
                        <h4>Riwayat Pengumuman</h4><hr>
                        @if (Session::has('berhasil_hapus'))
                            <div class="alert alert-success">
                                {{ Session::get('berhasil_hapus') }}
                            </div>
                        @endif
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Mata Pelajaran</td>
                                    <td>Tingkat</td>
                                    <td>Kelas</td>
                                    <td>Deskripsi</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pengumumanList as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_mapel }}</td>
                                        <td>{{ $item->kelas_id }}</td>
                                        <td>{{ $item->nama_kelas }}</td>
                                        <td>
                                            {!! $item->deskripsi !!}
                                        </td>
                                        <td>
                                            <button wire:click="deletePengumumanConfirm('{{ $item->kode_pengumuman }}')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteDataPengumuman">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@push('script')
<script>
    // $('#summernote').summernote({
    //     placeholder: 'Tambahkan pengumuman',
    //     tabsize: 2,
    //     height: 120,
    //     toolbar: [
    //       ['style', ['style']],
    //       ['font', ['bold', 'underline', 'clear']],
    //       ['color', ['color']],
    //       ['para', ['ul', 'ol', 'paragraph']],
    //       ['table', ['table']],
    //       ['insert', ['link']],
    //       ['view', ['codeview', 'help']]
    //     ]
    //   });
</script>

<script>
    Livewire.on('closeDeleteModal', function () {
        $('#DeleteDataPengumuman').modal('hide');
    });
</script>
@endpush