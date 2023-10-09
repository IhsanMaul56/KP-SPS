<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahDataSiswa extends Component
{
    public $nis, $nama_siswa, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $no_hp, $provinsi, $kota, $desa, $rt, $rw, $alamat;
    public $email;
    public $nik_ayah, $nama_ayah, $pekerjaan_ayah, $nik_ibu, $nama_ibu ,$pekerjaan_ibu, $provinsi_ortu, $kota_ortu, $desa_ortu, $rt_ortu, $rw_ortu, $alamat_ortu;
    public $kelas_id, $tingkat_id;
    public $tingkatList, $kelasList;

    public function render()
    {
        $tingkatData = DB::table('data_tingkats')
            ->select('kode_tingkat', 'nama_tingkat')
            ->get();

        $this->tingkatList = $tingkatData->pluck('nama_tingkat', 'kode_tingkat');

        $kelasData = DB::table('data_kelas')
            ->select('kode_kelas', 'nama_kelas')
            ->get();

        $this->kelasList = $kelasData->pluck('nama_kelas', 'kode_kelas');

        return view('livewire.tambah-data-siswa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:data_siswas,nis',
            'nama_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'desa' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'alamat' => 'required',
            'nik_ayah' => 'required',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'nik_ibu' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'provinsi_ortu' => 'required',
            'kota_ortu' => 'required',
            'desa_ortu' => 'required',
            'rt_ortu' => 'required',
            'rw_ortu' => 'required',
            'kelas_id' => 'required',
            'tingkat_id' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        data_siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'no_hp' => $request->no_hp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'desa' => $request->desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat' => $request->alamat,
            'nik_ayah' => $request->nik_ayah,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nik_ibu' => $request->nik_ibu,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'provinsi_ortu' => $request->provinsi_ortu,
            'kota_ortu' => $request->kota_ortu,
            'desa_ortu' => $request->desa_ortu,
            'rt_ortu' => $request->rt_ortu,
            'rw_ortu' => $request->rw_ortu,
            'alamat_ortu' => $request->alamat_ortu,
            'kelas_id' => $request->kelas_id,
            'tingkat_id' => $request->tingkat_id,
        ]);

        User::create([
            'name' => ucwords($request->nama_siswa),
            'email' => strtolower($request->email),
            'password' => bcrypt('12345'),
            'role' => 'siswa',
            'siswa_id' => $request->nis,
        ]);

        session()->flash('berhasil', 'Data guru berhasil disimpan.');

        $this->resetForm();

        return redirect()->back();
    }

    private function resetForm()
    {
        $this->nis = '';
        $this->nama_siswa = '';
        $this->tempat_lahir = '';
        $this->tanggal_lahir = '';
        $this->jenis_kelamin = '';
        $this->agama = '';
        $this->no_hp = '';
        $this->provinsi = '';
        $this->kota = '';
        $this->desa = '';
        $this->rt = '';
        $this->rw = '';
        $this->alamat = '';
        $this->nik_ayah = '';
        $this->nama_ayah = '';
        $this->pekerjaan_ayah = '';
        $this->nik_ibu = '';
        $this->nama_ibu = '';
        $this->pekerjaan_ibu = '';
        $this->provinsi_ortu = '';
        $this->kota_ortu = '';
        $this->desa_ortu = '';
        $this->rt_ortu = '';
        $this->rw_ortu = '';
        $this->alamat_ortu = '';
        $this->kelas_id = '';
        $this->tingkat_id = '';
    }
}
