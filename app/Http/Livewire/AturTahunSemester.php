<?php

namespace App\Http\Livewire;

use App\Models\DataSemester;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\tahun_akademik;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AturTahunSemester extends Component
{
    public $tahun_akademik;
    public $selectedTahunId = null;

    public $tahunAkademikList;
    public $semesterList;

    public function render()
    {
        $tahunAkademik = tahun_akademik::all();

        return view('livewire.atur-tahun-semester', compact('tahunAkademik'));
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

    public function updateStatus(Request $request)
    {
        $kode_tahun = $request->kode_tahun;
        $status     = $request->status;
        $tahun      = new tahun_akademik();
        
        try {            
            $tahun->where('status', 'aktif')->update(['status' => 'tidak aktif']);

            $tahun->where('kode_tahun', $kode_tahun)
                ->join('data_semesters as semester', 'kode_semester', 'semester_id')
                ->update([
                    'semester.status' => $status,
                    'tahun_akademiks.status' => $status
                ]);

            session()->flash('berhasil_aktif', 'Data Berhasil Diupdate.');
        } catch (\Exception $e) {
            session()->flash('gagal_aktif', 'Terjadi Kesalahan Saat Mengupdate Data' . $e->getMessage());
        }
    
        return redirect()->back();
    }    
}
