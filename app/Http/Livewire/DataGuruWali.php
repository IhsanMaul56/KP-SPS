<?php

namespace App\Http\Livewire;

use App\Models\data_wali;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataGuruWali extends Component
{
    public $search = '';
    public $showModal = false;
    public $guruList, $kelasList, $tingkatList, $akademikList;
    public $namaJurusan = [];
    public $wali_id;
    public $tingkat_id;
    public $kelas_id;
    public $selectedWaliId;
    public $data = [
        'kode_wali' => '',
        'wali_id' => '',
        'tingkat_id' => '',
        'kelas_id' => '',
    ];

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $akademik = DB::table('tahun_akademiks')
            ->select('kode_tahun', 'tahun_akademik')
            ->get();
        
        $this->akademikList = $akademik->pluck('tahun_akademik', 'kode_tahun');

        $tingkat = DB::table('data_tingkats')
            ->select('kode_tingkat', 'nama_tingkat')
            ->get();
        
        $this->tingkatList = $tingkat->pluck('nama_tingkat', 'kode_tingkat');

        $guru = DB::table('data_gurus')
            ->select('nip', 'nama_guru')
            ->get();

        $this->guruList = $guru->pluck('nama_guru', 'nip');

        $kelas = DB::table('data_kelas')
            ->select('kode_kelas', 'nama_jurusan', 'nama_kelas')
            ->get();

        $this->kelasList = $kelas->pluck('nama_kelas', 'kode_kelas');
        $this->namaJurusan = $kelas->pluck('nama_jurusan', 'kode_kelas');

        $wali = DB::table('data_walis')
            ->leftJoin('data_gurus', 'data_walis.wali_id', '=', 'data_gurus.nip')
            ->select(
                'data_walis.*',
                'data_gurus.no_hp AS guru_no_hp'
            )
            ->where(function ($query) {
                $query->where('data_walis.wali_id', 'like', '%' . $this->search . '%')
                    ->orWhere('data_walis.nama_guru', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.data-guru-wali', compact('wali'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function tampil()
    {
        return view('partials.kurikulum-wali');
    }

    public function createWali()
    {
        $this->validate([
            'wali_id' => 'required',
            'tingkat_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $guruData = DB::table('data_gurus')
            ->where('nip', $this->wali_id)
            ->value('nama_guru');

        $tingkatData = DB::table('data_tingkats')
            ->where('kode_tingkat', $this->tingkat_id)
            ->value('nama_tingkat');
        
        $kelasData = DB::table('data_kelas')
            ->where('kode_kelas', $this->kelas_id)
            ->value('nama_kelas');

        try {
            data_wali::create([
                'wali_id' => $this->wali_id,
                'nama_guru' => $guruData,
                'tingkat_id' => $this->tingkat_id,
                'nama_tingkat' => $tingkatData,
                'kelas_id' => $this->kelas_id,
                'nama_kelas' => $kelasData,
            ]);

            $this->showModal = false;
            session()->flash('berhasil', 'Data kelas berhasil disimpan.');
        } catch (\Exception $e) {
            Session::flash('gagal', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function resetField()
    {
        $this->wali_id = null;
        $this->tingkat_id = null;
        $this->kelas_id = null;
    }

    public function editWali($waliId)
    {
        $wali = data_wali::find($waliId);
        if($wali){
            $this->selectedWaliId = $waliId;
            $this->data = [
                'kode_wali' => $wali->kode_wali,
                'wali_id' => $wali->wali_id,
                'tingkat_id' => $wali->tingkat_id,
                'kelas_id' => $wali->kelas_id,
            ];
        }
    }

    public function updateSelectedWali()
    {
        $this->validate([
            'data.wali_id' => 'required',
            'data.tingkat_id' => 'required',
            'data.kelas_id' => 'required',
        ]);

        $guruData = DB::table('data_gurus')
            ->where('nip', $this->data['wali_id'])
            ->value('nama_guru');

        $tingkatData = DB::table('data_tingkats')
            ->where('kode_tingkat', $this->data['tingkat_id'])
            ->value('nama_tingkat');
        
        $kelasData = DB::table('data_kelas')
            ->where('kode_kelas', $this->data['kelas_id'])
            ->value('nama_kelas');

        try{
            data_wali::where('kode_wali', $this->data)->update([
                'wali_id' => $this->data['wali_id'],
                'nama_guru' => $guruData,
                'tingkat_id' => $this->data['tingkat_id'],
                'nama_tingkat' => $tingkatData,
                'kelas_id' => $this->data['kelas_id'],
                'nama_kelas' => $kelasData,
            ]);

            session()->flash('berhasil', 'Data kelas berhasil diupdate.');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat mengupdate data kelas: ' . $e->getMessage());
        }
    }

    public function deleteWaliConfirm($kode_wali)
    {
        $this->selectedWaliId = data_wali::find($kode_wali);
    }

    public function deleteWali()
    {
        if($this->selectedWaliId){
            data_wali::where('kode_wali', $this->selectedWaliId->kode_wali)->delete();
            Session::flash('berhasil', 'Data berhasil dihapus');
        }

        $this->resetPage();
    }
}