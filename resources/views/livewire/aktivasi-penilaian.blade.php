@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="col">
    <div class="row">
        <div class="col">
            <div class="card-body h-auto">
                <h4>Atur Tanggal Aktivasi Input Nilai Semester Ganjil</h4><hr>
                <form action="">
                    <div class="form-group mt-3">
                        <h5>Atur Tanggal Awal Input Nilai</h5>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="form-group mt-3 mb-4">
                        <h5>Atur Tanggal Akhir Input Nilai</h5>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="card-body h-auto">
                <h4>Atur Tanggal Aktivasi Input Nilai Semester Genap</h4><hr>
                <form action="">
                    <div class="form-group mt-3">
                        <h5>Atur Tanggal Awal Input Nilai</h5>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="form-group mt-3 mb-4">
                        <h5>Atur Tanggal Akhir Input Nilai</h5>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card-body h-auto">
                <h4>Riwayat Tanggal Aktivasi Semester Ganjil & Genap</h4><hr>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2022/2023</td>
                            <td>Ganjil</td>
                            <td>12/11/2023:20.30</td>
                            <td>12/11/2023:20.30</td>
                            <td>
                                <a href="" class="btn btn-warning"><i class="bi bi-pencil-square bg-warning text-white"></i></a>
                                <a href="" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>