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
            <div class="grid-tengah">
                <div class="row">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Input Nilai Siswa</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row p-0 m-0 page active-page" id="Formatif" style="font-size: unset">
                    <div class="card-body h-100 overflow-auto" id="shadow">
                        <div class="row mb-1">
                            <div class="col">
                                <span>Nama Peserta Didik</span>
                            </div>
                            <div class="col">
                                <span>: {{ $siswa->nama_siswa }}</span>
                            </div>
                            <div class="col">
                                <span>Fase</span>
                            </div>
                            <div class="col">
                                <span>:
                                    @if ($siswa->tingkat_id === 1)
                                        E
                                    @elseif ($siswa->tingkat_id === 2 || $siswa->tingkat_id === 3)
                                        F
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <span>NIS</span>
                            </div>
                            <div class="col">
                                <span>: {{ $siswa->nis }}</span>
                            </div>
                            <div class="col">
                                <span>Semester</span>
                            </div>
                            <div class="col">
                                <span>: 1</span>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <span>Kelas</span>
                            </div>
                            <div class="col">
                                <span>: {{ $siswa->nama_tingkat }} {{ $siswa->nama_kelas }}</span>
                            </div>
                            <div class="col">
                                <span>Tahun Ajaran</span>
                            </div>
                            <div class="col">
                                <span>: {{ $siswa->nama_tahun }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="font-size: unset">
                    <div class="col">
                        <div class="card-body h-100 overflow-auto" id="shadow">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-bold text-center">NILAI FORMATIF</h3>
                                    <hr>
                                </div>
                                @if (Session::has('berhasil_formatif'))
                                    <div class="alert alert-success">
                                        {{ Session::get('berhasil_formatif') }}
                                    </div>
                                @endif

                                @if (Session::has('gagal_formatif'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('gagal_formatif') }}
                                    </div>
                                @endif
                                <form wire:submit.prevent="createNilaiFormatif" method="POST" action="{{ route('insert-nilai-formatif') }}">
                                    @csrf
                                    <input type="hidden" wire:model="mapel_id" name="mapel_id" value="{{ $mapel_id }}">
                                    <input type="hidden" wire:model="tingkat_id" name="tingkat_id" value="{{ $tingkat_id }}">
                                    <input type="hidden" wire:model="kelas_id" name="kelas_id" value="{{ $kelas_id }}">
                                    <input type="hidden" wire:model="siswa_id" name="siswa_id" value="{{ $siswa_id }}">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <span>Nilai Tugas</span>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group">
                                                @if ($nilaiFormatif)
                                                    <input id="tugas" wire:model="tugas" name="tugas" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1)" placeholder="Masukan" value="{{ $nilaiFormatif->tugas }}">
                                                @else
                                                    <input id="tugas" wire:model="tugas" name="tugas" type="text" class="form-control @error('tugas') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1)" placeholder="Masukan">
                                                @endif
                                                
                                                @error('tugas')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <span>Nilai Kuis</span>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group">
                                                @if ($nilaiFormatif)
                                                    <input id="kuis" wire:model="kuis" name="kuis" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1)" placeholder="Masukkan" value="{{ $nilaiFormatif->kuis }}">
                                                @else
                                                    <input id="kuis" wire:model="kuis" name="kuis" type="text" class="form-control @error('kuis') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1)" placeholder="Masukkan">
                                                @endif

                                                @error('kuis')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body h-100 overflow-auto" id="shadow">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-bold text-center">NILAI SUMATIF</h3>
                                    <hr>
                                </div>
                                @if (Session::has('berhasil_sumatif'))
                                    <div class="alert alert-success">
                                        {{ Session::get('berhasil_sumatif') }}
                                    </div>
                                @endif
                    
                                @if (Session::has('gagal_sumatif'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('gagal_sumatif') }}
                                    </div>
                                @endif
                                <form wire:submit.prevent="createNilaiSumatif" method="POST" action="{{ route('insert-nilai-sumatif') }}">
                                    @csrf
                                    <input type="hidden" wire:model="mapel_id" name="mapel_id" value="{{ $mapel_id }}">
                                    <input type="hidden" wire:model="tingkat_id" name="tingkat_id" value="{{ $tingkat_id }}">
                                    <input type="hidden" wire:model="kelas_id" name="kelas_id" value="{{ $kelas_id }}">
                                    <input type="hidden" wire:model="siswa_id" name="siswa_id" value="{{ $siswa_id }}">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <span>Nilai UTS</span>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group">
                                                @if ($nilaiSumatif)
                                                    <input id="uts" wire:model="uts" name="uts" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1)" placeholder="Masukan" value="{{ $nilaiSumatif->uts }}">
                                                @else
                                                    <input id="uts" wire:model="uts" name="uts" type="text" class="form-control @error('uts') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1)" placeholder="Masukan">
                                                @endif

                                                @error('uts')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <span>Nilai UAS</span>
                                        </div>
                                        <div class="col-3">
                                            <div class="input-group">
                                                @if ($nilaiSumatif)
                                                    <input id="uas" wire:model="uas" name="uas" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1)" placeholder="Masukan" value="{{ $nilaiSumatif->uas }}">
                                                @else
                                                    <input id="uas" wire:model="uas" name="uas" type="text" class="form-control @error('uts') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1)" placeholder="Masukan">
                                                @endif

                                                {{-- <input id="uas" wire:model="uas" name="uas" type="text" class="form-control @error('uas') is-invalid @enderror" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan"> --}}
                                                @error('uas')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="grid-kanan">
                @include('partials.rightbar_guru')
            </div>
        </div>
    </div>
@endsection
