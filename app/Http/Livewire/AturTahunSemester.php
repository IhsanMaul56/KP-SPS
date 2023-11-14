<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DataSemester;
use Illuminate\Http\Request;
use App\Models\tahun_akademik;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AturTahunSemester extends Component
{
    public $tahun_akademik;
    public $tahunAkademikList;
    public $tahunAkademikSelected;

    public function render()
    {
        $tahunAkademik = tahun_akademik::all();
        $semester = DataSemester::all();

        $this->tahunAkademikList = [];

        foreach ($tahunAkademik as $akademik) {
            foreach ($semester as $s) {
                if ($s->kode_semester == $akademik->semester_id) {
                    $combinedKey = $akademik->kode_tahun . '_' . $s->kode_semester;
                    $displayText = $akademik->tahun_akademik . ' - ' . $s->nama_semester;
                    $this->tahunAkademikList[$combinedKey] = $displayText;
                }
            }
        }

        return view('livewire.atur-tahun-semester', compact('tahunAkademik'));
    }

    public function updateStatus()
    {
        try {
            if (empty($this->tahunAkademikSelected)) {
                throw new \Exception('Tahun Akademik belum dipilih.');
            }

            list($kodeTahun, $kodeSemester) = explode('_', $this->tahunAkademikSelected);

            $tahunAkademikExists = tahun_akademik::where('kode_tahun', $kodeTahun)->exists();
            $semesterExists = DataSemester::where('kode_semester', $kodeSemester)->exists();

            if (!$tahunAkademikExists || !$semesterExists) {
                throw new \Exception('Tahun Akademik atau Semester tidak valid.');
            }

            tahun_akademik::where('kode_tahun', $kodeTahun)->update(['status' => 'aktif']);

            DataSemester::where('kode_semester', $kodeSemester)->update(['status' => 'aktif']);

            session()->flash('berhasil_aktifasi', 'Data Berhasil Diaktifkan');
        } catch (\Exception $e) {
            session()->flash('gagal_aktifasi', 'Terjadi kesalahan saat mengaktifkan data: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function insertTahun(Request $request)
    {
        $request->validate([
            'tahun_akademik' => 'required|unique:tahun_akademiks,tahun_akademik',
        ], [
            'tahun_akademik.unique' => 'Tahun akademik sudah ada'
        ]);

        try {
            tahun_akademik::create([
                'tahun_akademik' => $request->tahun_akademik,
                'semester_id' => 1,
                'nama_semester' => '1',
                'status' => 'tidak aktif',
            ]);

            tahun_akademik::create([
                'tahun_akademik' => $request->tahun_akademik,
                'semester_id' => 2,
                'nama_semester' => '2',
                'status' => 'tidak aktif',
            ]);

            Session::flash('berhasil', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            Session::flash('gagal', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }

        $this->reset(['tahun_akademik']);

        return redirect()->back();
    }
}
