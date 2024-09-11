<div class="card-body h-100 overflow-auto" id="shadow">
    <div class="col">
        @if ($dataSiswa != null)
            <div class="row mb-3">
                <div class="col-auto">
                    <div class="persegi">
                        <p class="text-white m-0 fs-5 px-3">2022/2023</p>
                    </div>
                </div>
                <div class="col">
                    <div class="persegi2 m-0 px-3">
                        <p class="text-white m-0 fs-5">{{ $tingkat }} {{ $kelas }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: max-content;">
                </div>
                <div class="col text-end">
                    @if (isset($periode))
                        @if (now() >= $periode->start_date && now() <= $periode->end_date)
                        <button type="button" class="btn btn-primary" wire:click='naikKelas'>
                            <i class="bi bi-person-fill-up" style="padding-right:5px;"></i>Naik Kelas
                        </button>
                        @endif
                    @endif
                </div>
            </div>
            @if (Session::has('berhasil'))
                <div class="alert alert-success">
                    {{ Session::get('berhasil') }}
                </div>
            @elseif (Session::has('gagal'))
                <div class="alert alert-danger">
                    {{ Session::get('gagal') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        <th>JENIS KELAMIN</th>
                        <th>
                            <input type="checkbox" id="parentCheckbox" wire:model="selectAll">
                            <label class="form-check-label" for="parentCheckbox"></label>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($dataSiswa as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nis }}</td>
                            <td class="text-start">{{ $item->nama_siswa }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td colspan="2">
                                <input type="checkbox" class="childCheckbox" value="{{ $item->nis }}" wire:model='siswaSelected.{{ $item->nis }}'>
                                <label class="form-check-label" for="{{ $item->nis }}"></label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="col text-center">
                <img src="{{ URL::asset('/img/warning.png') }}" alt="warning" width="125px;">
            </div>
            <div class="col text-center pt-3">
                <span class="mt-3">Halaman Belum Bisa Diakses</span>
            </div>
        @endif
    </div>
</div>

<script>
    const parentCheckbox = document.getElementById('parentCheckbox');
    const childCheckboxes = document.querySelectorAll('.childCheckbox');

    parentCheckbox.addEventListener('click', function () {
      childCheckboxes.forEach(function (checkbox) {
        checkbox.checked = parentCheckbox.checked;
      });
    });
  </script>
