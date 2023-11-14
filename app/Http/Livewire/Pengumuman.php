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
    public $kelas;
    public $pengumuman;
    public $pengumumanList = [];
    public $jadwal;
    public $tingkatList = [];
    public $kelasList = [];
    public $guru_id, $deskripsi, $tingkat_id, $kelas_id, $siswa_id, $selectedPengumuman;

    public function render()
    {
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
                    ->select('kode_pengampu', 'pengampu_id')
                    ->get();
    
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
                    ->select('kode_pengumuman', 'tingkat_id', 'nama_tingkat', 'kelas_id', 'nama_kelas', 'deskripsi')
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

            }
            // dd($pengumumansiswa);
            
            return view('livewire.pengumuman-siswa', compact('pengumumansiswa'));
        }
    }

    public function createPengumuman(Request $request)
    {
        $guru_id = $request->input('guru_id');

        $request->validate([
            'deskripsi' => 'required',
            'guru_id' => 'required',
            'tingkat_id' => 'required',
            'kelas_id' => 'required'
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

        try {
            Pengumumaan::create([
                'deskripsi' => $request->deskripsi,
                'guru_id' => $guru_id,
                'nama_guru' => $guruPen,
                'tingkat_id' => $request->tingkat_id,
                'nama_tingkat' => $tingkatPen,
                'kelas_id' => $request->kelas_id,
                'nama_kelas' => $kelasPen,
            ]);

            session()->flash('berhasil', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi Kesalahan Saat Menambahkan Data' . $e->getMessage());
        }
        return redirect()->back();
    }

    // public function deletePengumumanConfirm()

    public function onDelete()
    {
        if($this->selectedPengumuman){
            Pengumumaan::where('kode_pengumuman', $this->selectedPengumuman->kode_pengumuman)->delete();

            Session::flash('berhasil', 'Data Berhasil Dihapus');
        }

        $this->resetPage();
        return redirect()->route('pengumuman-guru');
    }
}
