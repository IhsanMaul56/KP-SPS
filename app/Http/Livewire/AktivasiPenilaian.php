<?php

namespace App\Http\Livewire;

use App\Models\Periode;
use Livewire\Component;
use App\Models\tahun_akademik;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AktivasiPenilaian extends Component
{
    public $start_date;
    public $end_date;
    public $nama;
    
    public $data = [
        'id' => '',
        'nama' => '',
        'start_date' => '',
        'end_date' => ''
    ];

    public $selectedPeriodeId;

    public function render()
    {
        $periode = DB::table('periodes')
            ->leftJoin('tahun_akademiks', 'periodes.tahun_id', 'tahun_akademiks.kode_tahun')
            ->select(
                'periodes.*',
                'tahun_akademiks.tahun_akademik',
                'tahun_akademiks.nama_semester'
            )
            ->get();
        
        return view('livewire.aktivasi-penilaian', compact('periode'));
    }

    public function insertData()
    {
        $this->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'nama'  => 'required'
        ]);

        $tahunAkademik = tahun_akademik::where('status', 'aktif')->first();

        if (!$tahunAkademik) {
            throw new \Exception('Tahun akademik aktif tidak ditemukan.');
        }

        $checkPeriode = Periode::where('nama', $this->nama)->where('tahun_id', $tahunAkademik->kode_tahun)->first();

        if ($checkPeriode) {
            Session::flash('gagal', 'Periode Sudah Ada');
            return response()->json([
                'status'    => 'GAGAL'
            ]);
        }

        try{
            Periode::create([
                'nama' => $this->nama,
                'tahun_id' => $tahunAkademik->kode_tahun,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date
            ]);

            Session::flash('berhasil', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            Session::flash('gagal', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function editData($id)
    {
        $periode = Periode::find($id);
        if($periode) {
            $this->selectedPeriodeId = $id;
            $this->data = [
                'id' => $periode->id,
                'start_date' => $periode->start_date,
                'end_date' => $periode->end_date
            ];
        }
    }

    public function updateData()
    {
        $this->validate([
            'data.start_date' => 'required',
            'data.end_date' => 'required'
        ]);

        try {
            Periode::where('id', $this->selectedPeriodeId)->update([
                'start_date' => $this->data['start_date'],
                'end_date' => $this->data['end_date']
            ]);

            Session::flash('berhasil', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            Session::flash('gagal', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }

        return redirect()->route('aktivasi-nilai');
    }

    public function selectDelete($id)
    {
        $this->selectedPeriodeId = Periode::find($id);
    }

    public function deletePeriode()
    {
        if($this->selectedPeriodeId) {
            Periode::where('id', $this->selectedPeriodeId->id)->delete();
        }

        return redirect()->route('aktivasi-nilai');
    }

    public function tampil(){
        return view('partials.content_penilaian');
    }
}
