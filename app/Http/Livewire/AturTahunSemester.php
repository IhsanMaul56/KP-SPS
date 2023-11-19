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

    public $status;

    public $data = [
        'kode_tahun' => '',
        'status' => ''
    ];

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

    public function editStatus($tahunId)
    {
        $tahun = tahun_akademik::find($tahunId);
        
        if ($tahun) {
            $this->selectedTahunId = $tahunId;
            dd($this->selectedTahunId);
            $this->data = [
                'kode_tahun' => $tahun->kode_tahun,
                'status' => $tahun->status
            ];
        }
    }    

    public function updateStatus()
    {
        $this->validate([
            'data.status' => 'required'
        ]);

        dd($this->data);

        $pengampuId = DB::table('tahun_akademiks')
            ->where('kode_tahun', $this->data['kode_tahun'])
            ->value('semester_id');

        try {
            tahun_akademik::where('kode_tahun', $this->selectedTahunId)->update([
                'status' => $this->data['status']
            ]);

            DataSemester::where('kode_semester', $pengampuId)->update([
                'status' => $this->data['status']
            ]);

            session()->flash('berhasil_aktif', 'Data Berhasil Diupdate.');
        } catch (\Exception $e) {
            session()->flash('gagal_aktif', 'Terjadi Kesalahan Saat Mengupdate Data' . $e->getMessage());
        }
    
        $this->emit('refreshComponent');
        $this->emit('closeModal');
    }
}