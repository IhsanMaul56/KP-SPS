@extends('layouts.app')

@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <div class="container-fluid p-0">
        @include('partials.sidebar')
        <div class="col p-0">
            <div class="grid-tengah w-100 overflow-auto">
                <div class="row">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Pusat Informasi</span></span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <div class="col">
                        <div class="card-body h-100 overflow-auto" id="shadow">
                            <div class="row">
                                <div class="col text-center">
                                    <h4>Tambah Pengumuman Siswa</h4><hr>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <form method="post" action="{{ route('create-pengumuman') }}" wire:submit.prevent="createPengumuman">
                                            @csrf
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
                                                </div>
                                                <div class="col">
                                                    <select wire:model="kelas_id" name="kelas_id" id="" class="form-select @error('kelas_id') is-invalid @enderror">
                                                        <option value="" hidden selected>Pilih Kelas</option>
                                                        @foreach ($kelasList as $kelasId => $namaKelas)
                                                            <option value="{{ $kelasId }}">{{ $namaKelas }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <textarea wire:model="deskripsi" id="summernote" name="deskripsi"></textarea>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-end">
                                                        <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center">
                                    <h4>Riwayat Pengumuman</h4><hr>
                                </div>
                            </div>
                            <div class="col">
                                <table class="table table-bordered">
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
                                    
                                    <?php $no = 1; ?>
                                    @foreach ($pengumumanList as $index => $item)
                                    <tbody class="">
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td></td>
                                            <td>{{ $item->kelas_id }}</td>
                                            <td>{{ $item->nama_kelas }}</td>
                                            <td>
                                                {!! $item->deskripsi !!}
                                                <script>
                                                    $(document).ready(function() {
                                                        $('#summernote{{ $loop->iteration }}').summernote({
                                                            $('#summernote').summernote('destroy');
                                                        });
                                                    });
                                                </script>
                                            </td>
                                            <td>
                                                <span class="btn btn-warning"><i class="bi bi-pen"></i></span>
                                                <button class="btn btn-danger" wire:click="onDelete()"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    $('#summernote').summernote({
        placeholder: 'Tambahkan pengumuman',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['codeview', 'help']]
        ]
      });
</script>
@endpush

