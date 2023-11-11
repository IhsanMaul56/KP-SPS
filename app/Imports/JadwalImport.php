<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\data_kelas;
use App\Models\data_jadwal;
use App\Models\data_tingkat;
use App\Models\data_pengampu;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;

class JadwalImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation
{
    private $currentRow = 1;

    public function model(array $row)
    {
        try {
            $this->currentRow++;

            $tingkat = data_tingkat::where('nama_tingkat', $row['tingkat'])->first();
            $tingkat_id = $tingkat ? $tingkat->kode_tingkat : null;

            $kelas = data_kelas::where('nama_kelas', $row['kelas'])->first();
            $kelas_id = $kelas ? $kelas->kode_kelas : null;

            $pengampu = data_pengampu::whereHas('guru', function ($query) use ($row) {
                $query->where('nama_guru', $row['pengampu']);
            })->whereHas('mapel', function ($query) use ($row) {
                $query->where('nama_mapel', $row['mapel']);
            })->first();

            if($tingkat === null) {
                $message = 'Data tingkat tidak ditemukan untuk tingkat: ' . $row['tingkat'];
                $this->onFailure(new \Exception($message));
                return null;
            } elseif($kelas === null) {
                $message = 'Data kelas tidak ditemukan untuk kelas: ' . $row['kelas'];
                $this->onFailure(new \Exception($message));
                return null;
            } elseif ($pengampu === null) {
                $message = 'Data pengampu tidak ditemukan untuk guru: ' . $row['pengampu'] . ' dan mata pelajaran: ' . $row['mapel'];
                $this->onFailure(new \Exception($message));
                return null;
            } elseif ($tingkat === null && $kelas === null && $pengampu === null) {
                $message = 'Data pengampu tidak ditemukan untuk tingkat: ' . $row['tingkat'] . ' kelas: ' . $row['kelas'] . ' guru: ' . $row['pengampu'] . ' dan mata pelajaran: ' . $row['mapel'];
                $this->onFailure(new \Exception($message));
                return null;
            }

            $pengampu_id = $pengampu ? $pengampu->kode_pengampu : null;

            $waktuMasuk = Carbon::createFromFormat('H:i', $row['masuk']);
            $waktuKeluar = Carbon::createFromFormat('H:i', $row['keluar']);

            DB::beginTransaction();

            $existingJadwal = data_jadwal::where([
                'hari' => $row['hari'],
                'waktu_masuk' => $waktuMasuk->toTimeString(),
                'waktu_keluar' => $waktuKeluar->toTimeString(),
                'tingkat_id' => $tingkat_id,
                'nama_tingkat' => $row['tingkat'],
                'kelas_id' => $kelas_id,
                'nama_kelas' => $row['kelas'],
                'pengampu_id' => $pengampu_id,
            ])->first();
            
            if ($existingJadwal) {
                DB::rollBack();
                return null;
            }

            $jadwal = new data_jadwal([
                'hari' => $row['hari'],
                'waktu_masuk' => $waktuMasuk->toTimeString(),
                'waktu_keluar' => $waktuKeluar->toTimeString(),
                'tingkat_id' => $tingkat_id,
                'nama_tingkat' => $row['tingkat'],
                'kelas_id' => $kelas_id,
                'nama_kelas' => $row['kelas'],
                'pengampu_id' => $pengampu_id,
            ]);

            $jadwal->saveOrFail();

            DB::commit();

            return $jadwal;
        } catch (\Exception $e) {
            $this->onFailure($e);
            return null;
        }
    }

    public function onFailure(\Throwable $e)
    {
        DB::rollBack();
        $message = 'Gagal mengimpor data pada baris ' . $this->currentRow . '. Detail kesalahan: ' . $e->getMessage();
        Session::flash('gagal', $message);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [
            'tingkat' => 'required',
            'kelas' => 'required',
            'pengampu' => 'required',
            'mapel' => 'required',
            'hari' => 'required',
            'masuk' => 'required|date_format:H:i',
            'keluar' => 'required|date_format:H:i',
        ];
    }
}
