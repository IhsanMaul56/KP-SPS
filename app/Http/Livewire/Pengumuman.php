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
    // public $guru;
    public $tingkat;
    public $kelas;
    public $pengumuman;
    public $jadwal;
    public $tingkatList = [];
    public $kelasList = [];
    public $guru_id, $deskripsi, $tingkat_id, $kelas_id;

    public function render()
    {
        $user = Auth::user();

        if ($user && $user->guru_id) {
            $guru = DB::table('data_pengampus')
                ->where('pengampu_id', '=', $user->guru_id)
                ->select('kode_pengampu', 'pengampu_id')
                ->get();

                $this->guru_id = $guru->pengampu_id;

            if ($guru) {
                $pengampuKode = $guru->pluck('kode_pengampu');
                $this->jadwal = DB::table('data_jadwals')
                    ->where('pengampu_id', '=', $pengampuKode)
                    ->select('data_jadwals.tingkat_id', 'data_jadwals.nama_tingkat', 'data_jadwals.kelas_id', 'data_jadwals.nama_kelas')
                    ->get();
                // dd($this->jadwal);

                $this->tingkatList = $this->jadwal->pluck('nama_tingkat', 'tingkat_id');
                $this->kelasList = $this->jadwal->pluck('nama_kelas', 'kelas_id');
                // dd($this->kelasList);
            }
        }
        return view('livewire.pengumuman-guru', compact('guru'));
    }

    public function createPengumuman(Request $request)
    {
        dd($request);
        $user = Auth::user();
        $gurusid = $user->guru_id;

        $guru_id = $request->input('guru_id');

        $request->validate([
            'deskripsi' => 'required',
            'guru_id' => 'required',
            'tingkat_id' => 'required',
            'kelas_id' => 'required'
        ]);

        $guruPen = DB::table('data_pengampus')
            ->where('guru_id', $gurusid)
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
                'guru_id' => $gurusid,
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

    public function pengumumanSiswa()
    {
        return view('livewire.pengumuman-siswa');
    }
}
