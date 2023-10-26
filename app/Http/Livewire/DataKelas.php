<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_kelas;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataKelas extends Component
{
    public $nama_kelas;
    public $jurusan_id, $tingkat_id;
    public $jurusanList, $tingkatList;
    public $showModal = false;
    public $search = '';
    public $selectedKelasId;
    public $selectedKelas = [
        'kode_kelas' => '',
        'nama_kelas' => '',
        'jurusan_id' => '',
        'tingkat_id' => '',
    ];

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $jurusan = DB::table('data_jurusans')
            ->select('kode_jurusan', 'nama_jurusan')
            ->get();
        
        $this->jurusanList = $jurusan->pluck('nama_jurusan', 'kode_jurusan');

        $tingkat = DB::table('data_tingkats')
            ->select('kode_tingkat', 'nama_tingkat')
            ->get();
        
        $this->tingkatList = $tingkat->pluck('nama_tingkat', 'kode_tingkat');

        $kelas = DB::table('data_kelas')
            ->leftJoin('data_walis', 'data_kelas.kode_kelas', '=', 'data_walis.kelas_id')
            ->leftJoin('data_gurus', 'data_walis.wali_id', '=', 'data_gurus.nip')
            ->leftJoin('data_tingkats', 'data_kelas.tingkat_id', '=', 'data_tingkats.kode_tingkat')
            ->select(
                'data_kelas.*',
                'data_gurus.nama_guru',
                'data_tingkats.nama_tingkat'
            )
            ->where(function ($query) {
                $query->where('data_kelas.nama_kelas', 'like', '%' . $this->search . '%')
                    ->orWhere('data_walis.nama_guru', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.data-kelas', compact('kelas'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.kelas-data');
    }

    public function createKelas()
    {
        $this->validate([
            'nama_kelas' => 'required',
            'jurusan_id' => 'required',
            'tingkat_id' => 'required',
        ]);

        $jurusanData = DB::table('data_jurusans')
            ->where('kode_jurusan', $this->jurusan_id)
            ->value('nama_jurusan');

        $tingkatData = DB::table('data_tingkats')
            ->where('kode_tingkat', $this->tingkat_id)
            ->value('nama_tingkat');
        
        try {
            data_kelas::create([
                'nama_kelas' => $this->nama_kelas,
                'jurusan_id' => $this->jurusan_id,
                'nama_jurusan' => $jurusanData,
                'tingkat_id' => $this->tingkat_id,
                'nama_tingkat' => $tingkatData,
            ]);

            $this->showModal = false;
            session()->flash('berhasil', 'Data kelas berhasil disimpan.');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat menyimpan data kelas: ' . $e->getMessage());
        }
    }

    public function resetFields()
    {
        $this->nama_kelas = null;
        $this->jurusan_id = null;
        $this->tingkat_id = null;
    }

    public function editKelas($kelasId)
    {
        $kelas = data_kelas::find($kelasId);
        if ($kelas) {
            $this->selectedKelasId = $kelasId;
            $this->selectedKelas = [
                'kode_kelas' => $kelas->kode_kelas,
                'nama_kelas' => $kelas->nama_kelas,
                'jurusan_id' => $kelas->jurusan_id,
                'tingkat_id' => $kelas->tingkat_id,
            ];
            $this->showModal = true;
        }
    }

    public function updateSelectedKelas()
    {
        $this->validate([
            'selectedKelas.nama_kelas' => 'required',
            'selectedKelas.jurusan_id' => 'required',
            'selectedKelas.tingkat_id' => 'required',
        ]);

        $jurusanData = DB::table('data_jurusans')
            ->where('kode_jurusan', $this->selectedKelas['jurusan_id'])
            ->value('nama_jurusan');

        $tingkatData = DB::table('data_tingkats')
            ->where('kode_tingkat', $this->selectedKelas['tingkat_id'])
            ->value('nama_tingkat');

        try {
            data_kelas::where('kode_kelas', $this->selectedKelasId)->update([
                'nama_kelas' => $this->selectedKelas['nama_kelas'],
                'jurusan_id' => $this->selectedKelas['jurusan_id'],
                'nama_jurusan' => $jurusanData,
                'tingkat_id' => $this->selectedKelas['tingkat_id'],
                'nama_tingkat' => $tingkatData,
            ]);

            $this->showModal = false;
            session()->flash('berhasil', 'Data kelas berhasil diupdate.');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat mengupdate data kelas: ' . $e->getMessage());
        }
    }

    public function deleteKelas($kode_kelas)
    {
        data_kelas::where('kode_kelas', $kode_kelas)->delete();

        $this->resetPage();

        Session::flash('berhasil', 'Data berhasil dihapus');
    }
}
