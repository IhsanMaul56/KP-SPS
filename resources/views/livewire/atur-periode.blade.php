<div class="card-body h-100 overflow-auto" id="shadow">
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control mb-3" wire:model="search" placeholder="Cari" style="width: max-content;">
            </div>
            <div class="col-3" style="width: max-content;">
                <button href="" class="btn btn-primary" style="text-decoration: none;">
                    <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
                </button>
            </div>
        </div>
        <div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>MULAI</th>
                    <th>AKHIR</th>
                    <td>AKSI</td>
                </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td>Periode Penilaian</td>
                        <td>10 Januari 2023</td>
                        <td>20 Januari 2023</td>
                        <td>
                            <button>
                                <i class="bi bi-trash3" class="btn btn-warning"></i>
                            </button>
                            <button>
                                <i class="bi bi-trash3" class="btn btn-danger"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- <script>
    Livewire.on('closeDeleteModal', function () {
        $('#DeleteDataSiswa').modal('hide');
    });
</script> --}}