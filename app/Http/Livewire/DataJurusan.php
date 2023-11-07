<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\data_wali;
use App\Models\data_kajur;
use App\Models\data_kelas;
use App\Models\data_siswa;
use App\Models\data_jadwal;
use App\Models\data_jurusan;
use Livewire\WithPagination;
use App\Models\nilai_sumatif;
use App\Models\nilai_formatif;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataJurusan extends Component
{
    public $guruList;
    public $nama_jurusan, $guru_id, $kajur_id;
    public $jurusanSelectedId;
    public $showModal = false;
    public $selectedJurusan = [
        'kode_jurusan',
        'nama_jurusan',
        'kajur_id'
    ];

    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $guru = DB::table('data_gurus')
            ->select('nip', 'nama_guru')
            ->get();

        $this->guruList = $guru->pluck('nama_guru', 'nip');

        $jurusan = DB::table('data_jurusans')
            ->leftJoin('data_kajurs', 'data_jurusans.kajur_id', '=', 'data_kajurs.kode_kajur')
            ->select('data_jurusans.*')
            ->paginate(10);

        return view('livewire.data-jurusan', compact('jurusan'));
    }

    public function countKelas($jurusanId){
        $kelasCount = data_kelas::where('jurusan_id', $jurusanId)->count();

        return $kelasCount;
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.jurusan-data');
    }

    public function createJurusan()
    {
        $this->validate([
            'nama_jurusan' => 'required',
            'guru_id' => 'required',
        ]);

        try {
            $guruData = DB::table('data_gurus')
                ->where('nip', $this->guru_id)
                ->value('nama_guru');

            $kajur = data_kajur::updateOrCreate(
                ['guru_id' => $this->guru_id],
                ['nama_guru' => $guruData]
            );

            $kajur = data_kajur::where('guru_id', $this->guru_id)->orderBy('created_at', 'desc')->first();
        
            data_jurusan::create([
                'nama_jurusan' => $this->nama_jurusan,
                'kajur_id' => $kajur->kode_kajur,
                'nama_guru' => $kajur->nama_guru,
            ]);

            $this->reset(['nama_jurusan', 'guru_id']);

            Session::flash('berhasil', 'Data Berhasil Ditambahkan');

        } catch (\Exception $e) {
            Session::flash('gagal', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
        return redirect()->route('m-jurusan');
    }

    public function editJurusan($jurusanId)
    {
        $jurusan = data_jurusan::with('kajur')->find($jurusanId);
        if ($jurusan) {
            $this->jurusanSelectedId = $jurusanId;
            $this->selectedJurusan = [
                'kode_jurusan' => $jurusan->kode_jurusan,
                'nama_jurusan' => $jurusan->nama_jurusan,
                'guru_id' => $jurusan->kajur->guru_id,
            ];
            $this->showModal = true;
        }
    }

    public function updateSelectedJurusan()
    {
        $this->validate([
            'selectedJurusan.nama_jurusan' => 'required',
            'selectedJurusan.guru_id' => 'required',
        ]);

        try {
            $guruData = DB::table('data_gurus')
                ->where('nip', $this->selectedJurusan['guru_id'])
                ->first();

            if ($guruData) {
                $kajur = data_kajur::updateOrCreate(
                    ['guru_id' => $guruData->nip],
                    ['nama_guru' => $guruData->nama_guru]
                );

                $kajur = data_kajur::where('guru_id', $guruData->nip)->orderBy('created_at', 'desc')->first();

                data_jurusan::find($this->jurusanSelectedId)->update([
                    'nama_jurusan' => $this->selectedJurusan['nama_jurusan'],
                    'kajur_id' => $kajur->kode_kajur,
                    'nama_guru' => $guruData->nama_guru,
                ]);

                $this->reset(['selectedJurusan']);
                $this->showModal = false;

                Session::flash('berhasil', 'Data Berhasil Diupdate');
            } else {
                Session::flash('gagal', 'Data guru tidak ditemukan.');
            }
        } catch (\Exception $e) {
            Session::flash('gagal', 'Terjadi kesalahan saat mengupdate data kelas: ' . $e->getMessage());
        }
        return redirect()->route('m-jurusan');
    }

    public function deleteJurusanConfirm($kode_jurusan)
    {
        $this->jurusanSelectedId = data_jurusan::find($kode_jurusan);
    }

    public function deleteJurusan()
    {
        if ($this->jurusanSelectedId) {
            User::whereHas('siswa', function($query) {
                $query->whereHas('kelas', function($kelasQuery) {
                    $kelasQuery->where('jurusan_id', $this->jurusanSelectedId->kode_jurusan);
                });
            })->delete();
            data_jadwal::whereHas('kelas', function($query) {
                $query->where('jurusan_id', $this->jurusanSelectedId->kode_jurusan);
            })->delete();
            data_siswa::whereHas('kelas', function($query) {
                $query->where('jurusan_id', $this->jurusanSelectedId->kode_jurusan);
            })->delete();
            data_wali::whereHas('kelas', function($query) {
                $query->where('jurusan_id', $this->jurusanSelectedId->kode_jurusan);
            })->delete();
            nilai_formatif::whereHas('kelas', function($query) {
                $query->where('jurusan_id', $this->jurusanSelectedId->kode_jurusan);
            })->delete();
            nilai_sumatif::whereHas('kelas', function($query) {
                $query->where('jurusan_id', $this->jurusanSelectedId->kode_jurusan);
            })->delete();
            data_kelas::where('jurusan_id', $this->jurusanSelectedId->kode_jurusan)->delete();
            data_jurusan::where('kajur_id', $this->jurusanSelectedId->kode_jurusan)->delete();
            data_jurusan::where('kode_jurusan', $this->jurusanSelectedId->kode_jurusan)->delete();

            Session::flash('berhasil', 'Data Berhasil Dihapus');
        }

        $this->resetPage();
        return redirect()->route('m-jurusan');
    }
}
