<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Pengumumaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Pengumuman extends Component
{
    public $tingkat;
    public $showModal = false;
    public $kelas;
    public $pengumuman;
    public $pengumumanList = [];
    public $kode_pengumuman;
    public $jadwal;
    public $mapel;
    public $mapelId;
    public $selectedPengumumanId;
    public $mapelList = [];
    public $tingkatList = [];
    public $kelasList = [];
    public $mapelSelected = "";
    public $guru_id, $deskripsi, $tingkat_id, $kelas_id, $siswa_id, $mapel_id, $nama_mapel;

    public function render()
    {
        $user = Auth::user();

        if(Auth::user()->role == 'guru'){
            $user = Auth::user();
            if ($user && $user->guru_id) {
                $guru = DB::table('data_gurus')
                    ->where('nip', '=', $user->guru_id)
                    ->select('nip')
                    ->first();

                    $this->guru_id = $guru->nip ?? null;

                $pengampu = DB::table('data_pengampus')
                    ->where('pengampu_id', '=', $this->guru_id)
                    ->select('kode_pengampu', 'pengampu_id', 'mapel_id', 'nama_mapel')
                    ->get();

                    $this->mapelList = $pengampu->pluck('nama_mapel', 'mapel_id');
                    // dd($this->mapelList);

                if ($pengampu->isNotEmpty()) {
                    $pengampuKode = $pengampu->pluck('kode_pengampu')->toArray();

                    $jadwal = DB::table('data_jadwals')
                        ->whereIn('pengampu_id', $pengampuKode)
                        ->select('data_jadwals.tingkat_id', 'data_jadwals.nama_tingkat', 'data_jadwals.kelas_id', 'data_jadwals.nama_kelas')
                        ->get();

                    $this->tingkatList = $jadwal->pluck('nama_tingkat', 'tingkat_id');
                    $this->kelasList = $jadwal->pluck('nama_kelas', 'kelas_id');
                }

                $pengumuman = DB::table('pengumumaans')
                    ->where('guru_id', '=', $this->guru_id)
                    ->select('kode_pengumuman', 'tingkat_id', 'nama_tingkat', 'kelas_id', 'nama_kelas', 'mapel_id', 'nama_mapel', 'deskripsi')
                    ->get();
                    $this->pengumumanList = $pengumuman->reject('kode_pengumuman', 'nama_tingkat', 'tingkat_id', 'kelas_id', 'nama_kelas', 'deskripsi');
                // dd($this->pengumumanList);
            }
            return view('livewire.pengumuman-guru', compact('guru', 'jadwal', 'pengumuman'));
        }
        else if(Auth::user()->role == 'siswa'){
            $user = Auth::user();
            if($user && $user->siswa_id){
                $siswa = DB::table('data_siswas')
                    ->where('nis', '=', $user->siswa_id)
                    ->select('nis', 'tingkat_id', 'kelas_id')
                    ->get();
                    // dd($siswa);
                if($siswa){
                    $siswatingkat = $siswa->pluck('tingkat_id');
                    $siswakelas = $siswa->pluck('kelas_id');

                    $pengumumansiswa = DB::table('pengumumaans')
                    ->where('tingkat_id', '=', $siswatingkat)
                    ->where('kelas_id', '=', $siswakelas)
                    ->select('deskripsi')
                    ->get();

                    // dd($pengumumansiswa);
                }
                return view('livewire.pengumuman-siswa', compact('pengumumansiswa'));
            }   
        }
    }

    // public function tampil()
    // {
    //     return view('livewire.pengumuman');
    // }

    public function createPengumuman(Request $request)
    {
        // dd($request);
        $guru_id = $request->input('guru_id');

        $request->validate([
            'deskripsi' => 'required',
            'guru_id' => 'required',
            'tingkat_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
        ]);

        $guruPen = DB::table('data_pengampus')
            ->where('pengampu_id', $guru_id)
            ->value('nama_guru');

        $tingkatPen = DB::table('data_tingkats')
            ->where('kode_tingkat', $request->tingkat_id)
            ->value('nama_tingkat');

        $kelasPen = DB::table('data_kelas')
            ->where('kode_kelas', $request->kelas_id)
            ->value('nama_kelas');
        
        $mapelPen = DB::table('data_pengampus')
            ->where('mapel_id', $request->mapel_id)
            ->value('nama_mapel');

        try {
            Pengumumaan::create([
                'deskripsi' => $request->deskripsi,
                'guru_id' => $guru_id,
                'nama_guru' => $guruPen,
                'tingkat_id' => $request->tingkat_id,
                'nama_tingkat' => $tingkatPen,
                'kelas_id' => $request->kelas_id,
                'nama_kelas' => $kelasPen,
                'mapel_id' => $request->mapel_id,
                'nama_mapel' => $mapelPen,
            ]);

            session()->flash('berhasil', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi Kesalahan Saat Menambahkan Data' . $e->getMessage());
        }
        return redirect()->back();
    }
    
    public function deletePengumumanConfirm($kode_pengumuman)
    {
        $this->selectedPengumumanId = Pengumumaan::find($kode_pengumuman);
    }

    public function deletePengumuman()
    {
        if($this->selectedPengumumanId){
            Pengumumaan::where('kode_pengumuman', $this->selectedPengumumanId)->delete();
            Session::flash('Berhasil', 'Data Berhasil Dihapus');
        }

        $this->resetPage();
        return redirect()->route('show_pengumuman');
    }
}
