<div class="col">
    <div class="card-body h-100 overflow-auto">
        <div class="col">
            <h3 class="fs-5 mb-2">Atur TP Untuk Kelulusan Mata Pelajaran</h3>
            <hr>
            <form>
                <div class="fom-group">
                    <label>Tahun Ajaran :</label>
                    <select name="Mata Pelajaran" class="form-control">
                        <option value="" hidden selected>2022/2023</option>
                        @foreach ($akademikList as $kodeTahun => $tahunAkademik)
                            <option value="{{ $akademikList }}">{{ $tahunAkademik }}</option>
                        @endforeach
                    </select><br>
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran :</label>
                    <select name="Mata Pelajaran" class="form-control">
                        <option value="" hidden selected>Nama Mapel</option>
                        @foreach ($mapelList as $kodeMapel => $namaMapel)
                            <option value="{{ $mapelList }}">{{ $namaMapel }}</option>
                        @endforeach
                    </select><br>
                </div>

                <div class="form-group">
                    <label>Nama TP :</label>
                    <select name="Mata Pelajaran" class="form-control">
                        <option value="" hidden selected>TP 1 - ???</option>
                        <option value=""></option>
                    </select><br>
                </div>

                <div class="form-group">
                    <label>ATP 1 :</label>
                    <input type="text" name="tp" class="form-control" placeholder="Masukkan TP">
                </div><br><br>

                <span class="btn btn-primary">Simpan</span>
            </form>
        </div>
    </div>
</div>
