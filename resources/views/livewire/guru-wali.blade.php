@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush
<div class="row">
    <div class="col">
        @if ($dataSiswa != null)
            <div class="row mb-3">
                <div class="persegi">
                      @if(count($akademik) > 0)
                          <p class="text-white m-0 fs-5 px-3">{{ $akademik[0]->tahun_akademik }}</p>
                      @else
                          <p class="text-white m-0 fs-5 px-3">Tidak ada data tahun akademik.</p>
                      @endif
                  </div>
              </div>
                <div class="col">
                    <div class="persegi2 m-0 px-3">
                        <p class="text-white m-0 fs-5">{{ $tingkat }} {{ $kelas }}</p>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control" wire:model="search" placeholder="Search" style="border-color: rgba(168, 168, 168, 1); width: 250px; border-radius: 10px 10px 10px 10px;">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($dataSiswa as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <span class="btn btn-success"><i class="bi bi-eye"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col text-end mt-5">
                <button class="btn btn-success" id="shadow" type="submit" style="position: relative;">Setujui</button>
            </div>
        @else
            <div class="col text-center">
                <img src="{{URL::asset('/img/warning.png')}}" alt="warning" width="125px;">
            </div>
            <div class="col text-center pt-3">
                <span class="mt-3">Halaman Belum Bisa Diakses</span>
            </div>
        @endif
    </div>
</div>