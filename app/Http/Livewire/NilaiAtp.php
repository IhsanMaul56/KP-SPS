<?php

namespace App\Http\Livewire;

use App\Models\data_atp;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class NilaiAtp extends Component
{
    public $akademikList;
    public $mapelList;
    public $mapelId;
    public $tpList;
    public $selectedMapel;
    public $jumlah_atp;
    public $nama_atp, $tp_id;
    public $showModal = false;

    public function render()
    {
        $tahunAkademik = DB::table('tahun_akademiks')
            ->select('kode_tahun', 'tahun_akademik')
            ->get();

        $this->akademikList = $tahunAkademik->pluck('tahun_akademik');

        $mataPelajaran = DB::table('data_mapels')
            ->select('kode_mapel', 'nama_mapel')
            ->get();

        $this->mapelList = $mataPelajaran->pluck('nama_mapel');
        $this->mapelId = $mataPelajaran->pluck('kode_mapel');

        if (empty($this->selectedMapel)) {
            $this->selectedMapel = $this->mapelList[0];
        }

        if ($mataPelajaran) {
            $selectedMapelId = $this->mapelList->search($this->selectedMapel);

            $dataTP = DB::table('data_tps')
                ->where('mapel_id', $selectedMapelId)
                ->select('kode_tp', 'nama_tp')
                ->get();

            $this->tpList = $dataTP->pluck('nama_tp', 'kode_tp');
        }

        return view('livewire.nilai-atp');
    }

    public function createATP()
    {
        $this->validate([
            'tp_id' => 'required',
        ]);
    
        $tpData = DB::table('data_tps')
            ->where('kode_tp', $this->tp_id)
            ->first();
    
        if (!$tpData) {
            session()->flash('gagal', 'Data TP tidak ditemukan.');
            return;
        }
    
        try {
            $nama_atp_values = array_values($this->nama_atp);
            $insertData = [];
    
            foreach ($nama_atp_values as $nama_atp) {
                $insertData[] = [
                    'nama_atp' => $nama_atp,
                    'tp_id' => $this->tp_id,
                    'nama_tp' => $tpData->nama_tp,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
    
            data_atp::insert($insertData);
    
            $this->showModal = false;
            session()->flash('berhasil', 'Data ATP berhasil disimpan.');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat menyimpan data ATP: ' . $e->getMessage());
        }
    }
    

    public function tampil()
    {
        return view('livewire.lihat-atp');
    }
}
