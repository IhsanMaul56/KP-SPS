@include('livewire.create-kelas')
@include('livewire.update-kelas')

<div class="card-body h-100 overflow-auto">
    <div class="col">
        <div class="col mb-3 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertKelas">
                <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
            </button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Wali Kelas</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $index => $item)
                    <tr class="text-center">
                        <td>{{ $dakel->firstItem() + $index }}</td>
                        <td>{{ $item->nama_tingkat }} {{ $item->nama_kelas}}</td>
                        <td>{{ $item->nama_guru }}</td>
                        <td>
                            @if ($item->guru_no_hp)
                                {{ $item->guru_no_hp }}
                            @else
                                Tidak Ditemukan
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#UpdateKelas">
                                <i class="bi bi-pencil-square text-white"></i>
                            </button>
                                <span class="btn btn-danger"><i class="bi bi-trash3"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dakel->links() }}
    </div>
</div>