<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_elemen;
use App\Models\data_tp;
use Illuminate\Support\Facades\DB;

class NilaiTp extends Component
{
    public $akademikList;
    public $mapelList;
    public $nama_tp, $mapel_id;
    public $jumlah_tp;
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
        return view('livewire.nilai-tp');
    }

    public function createTP()
    {
        $this->validate([
            'mapel_id' => 'required',
            'nama_tp.*' => 'required',
        ], [
            'mapel_id.required' => 'Pilih Mata Pelajaran.',
            'nama_tp.*.required' => 'Kolom TP harus diisi.',
        ]);

        $mapelData = DB::table('data_mapels')
            ->where('kode_mapel', $this->mapel_id)
            ->value('nama_mapel');

        $nama_tp_values = $this->nama_tp;

        try {
            foreach ($nama_tp_values as $nama_tp) {
                data_tp::create([
                    'nama_tp' => $nama_tp,
                    'mapel_id' => $this->mapel_id,
                    'nama_mapel' => $mapelData
                ]);
            }

            $this->showModal = false;
            session()->flash('berhasil', 'Data TP berhasil disimpan.');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat menyimpan data TP: ' . $e->getMessage());
        }
    }


    public function tampil()
    {
        return view('livewire.lihat-tp');
    }
}
