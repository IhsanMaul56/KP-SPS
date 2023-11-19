<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pengumumaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DeletePengumuman extends Component
{
    public $pengumumanList;
    public $selectedPengumumanId;
    public $guru_id, $mapelList, $tingkatList, $kelasList;
    

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
            }
            return view('livewire.delete-pengumuman', compact('guru', 'jadwal', 'pengumuman'));
        }
    }

    public function deletePengumumanConfirm($kode_pengumuman)
    {
        $this->selectedPengumumanId = Pengumumaan::find($kode_pengumuman);
    }

    public function deletePengumuman()
    {
        if($this->selectedPengumumanId){
            Pengumumaan::where('kode_pengumuman', $this->selectedPengumumanId->kode_pengumuman)->delete();
            Session::flash('berhasil_hapus', 'Data Berhasil Dihapus');
        }
        return redirect()->route('show_pengumuman');
    }


}
