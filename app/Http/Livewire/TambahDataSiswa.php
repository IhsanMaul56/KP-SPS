<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\data_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TambahDataSiswa extends Component
{
    public $nis, $nama_siswa, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $no_hp, $provinsi, $kota, $desa, $rt, $rw, $alamat;
    public $email;
    public $nik_ayah, $nama_ayah, $pekerjaan_ayah, $nik_ibu, $nama_ibu ,$pekerjaan_ibu, $provinsi_ortu, $kota_ortu, $desa_ortu, $rt_ortu, $rw_ortu, $alamat_ortu;
    public $kelas_id, $tingkat_id;
    public $tingkatList, $kelasList;
    public $data = [
        'nis' => '',
        'nama_siswa' => '',
        'tempat_lahir' => '',
        'tanggal_lahir' => '',
        'jenis_kelamin' => '',
        'agama' => '',
        'provinsi' => '',
        'kota' => '',
        'desa' => '',
        'rt' => '',
        'rw' => '',
        'alamat' => '',
        'no_hp' => '',
        'email' => '',
        'nik_ayah' => '',
        'nama_ayah' => '',
        'pekerjaan_ayah' => '',
        'nik_ibu' => '',
        'nama_ibu' => '',
        'pekerjaan_ibu' => '',
        'provinsi_ortu' => '',
        'kota_ortu' => '',
        'desa_ortu' => '',
        'rt_ortu' => '',
        'rw_ortu' => '',
        'alamat_ortu' => '',
    ];

    public $formPart1 = [
        'nis' => '',
        'nama_siswa' => '',
        'tempat_lahir' => '',
        'tanggal_lahir' => '',
        'jenis_kelamin' => '',
        'agama' => '',
        'provinsi' => '',
        'kota' => '',
        'desa' => '',
        'rt' => '',
        'rw' => '',
        'alamat' => '',
        'no_hp' => '',
    ];

    public $currentPage = 1;

    public function submitFormPart1()
    {
        $this->validate([

        ]);
        $this->currentPage = 2;
    }

    public function submitFormPart2()
    {
        $this->validate([

        ]);
        
        $this->currentPage = 1;
    }

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
            'email' => 'required|email|unique:users,email',
            
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
            'alamat_ortu' => 'required',

            'kelas_id' => 'required',
            'tingkat_id' => 'required',
        ], [
            'nis.required' => 'NIS Harus Diisi',
            'nis.unique' => 'NIS Sudah Ada Dalam Database',
            'nama_siswa.required' => 'Nama Siswa Harus Diisi',
            'tempat_lahir.required' => 'Tempat Lahir Harus Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Diisi',
            'agama.required' => 'Agama Harus Diisi',
            'no_hp.required' => 'No. HP Harus Diisi',
            'provinsi.required' => 'Provinsi Harus Diisi',
            'kota.required' => 'Kota Harus Diisi',
            'desa.required' => 'Desa Harus Diisi',
            'rt.required' => 'RT Harus Diisi',
            'rw.required' => 'RW Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'email.required' => 'Format Email Tidak Valid',
            'email.unique' => 'Email Sudah Ada Dalam Database',

            'nik_ayah.required' => 'NIK Ayah Harus Diisi',
            'nama_ayah.required' => 'Nama Ayah Harus Diisi',
            'pekerjaan_ayah.required' => 'Pekerjaan Ayah Harus Diisi',
            'nik_ibu.required' => 'NIK Ibu Harus Diisi',
            'nama_ibu.required' => 'Nama Ibu Harus Diisi',
            'pekerjaan_ibu.required' => 'Pekerjaan Ibu Harus Diisi',
            'provinsi_ortu.required' => 'Provinsi Harus Diisi',
            'kota_ortu.required' => 'Kota Harus Diisi',
            'desa_ortu.required' => 'Desa Harus Diisi',
            'rt_ortu.required' => 'RT Harus Diisi',
            'rw_ortu.required' => 'RW Harus Diisi',
            'alamat_ortu.required' => 'Alamat Harus Diisi',

            'kelas_id' => 'Kelas Harus Diisi',
            'tingkat_id' => 'Tingkat Harus Diisi',
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

        session()->flash('berhasil', 'Data Berhasil Ditambahkan');

        $this->resetForm();

        return redirect()->back();
    }

    public function viewUpdate($nis)
    {
        $siswa = DB::table('users')
            ->leftJoin('data_siswas', 'users.siswa_id', '=', 'data_siswas.nis')
            ->where('data_siswas.nis', '=', $nis)
            ->select(
                'users.email',
                'data_siswas.*'
            )
            ->first();

        if ($siswa) {
            return view('livewire.update-data-siswa')->with('siswa', $siswa);
        } else {
            session()->flash('gagal', 'Siswa Tidak Ditemukan');
        }
    }

    public function update(Request $request)
    {
        $existingUser = DB::table('users')
            ->leftJoin('data_gurus', 'users.guru_id', '=', 'data_gurus.nip')
            ->where('email', $request->email)
            ->where('siswa_id', '!=', $request->nis)
            ->first();

        if ($existingUser) {
            session()->flash('gagal', 'Email address Sudah Digunakan');
        } else {
            DB::table('users')
                ->leftJoin('data_siswas', 'users.siswa_id', '=', 'data_siswas.nis')
                ->where('data_siswas.nis', '=', $request->nis)
                ->update([
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
                    'email' => $request->email,
                ]);

            session()->flash('berhasil', 'Data Berhasil Diupdate');
        }

        return redirect()->back();
    }

    public function mount()
    {
        $dataSiswa = DB::table('users')
            ->leftJoin('data_siswas', 'users.siswa_id', '=', 'data_siswas.nis')
            ->select(
                'users.email',
                'data_siswas.*',
            )
            ->first();
        
        if($dataSiswa){
            $this->data['nis'] = $dataSiswa->nis;
            $this->data['nama_siswa'] = $dataSiswa->nama_siswa;
            $this->data['tempat_lahir'] = $dataSiswa->tempat_lahir;
            $this->data['tanggal_lahir'] = $dataSiswa->tanggal_lahir;
            $this->data['jenis_kelamin'] = $dataSiswa->jenis_kelamin;
            $this->data['agama'] = $dataSiswa->agama;
            $this->data['no_hp'] = $dataSiswa->no_hp;
            $this->data['email'] = $dataSiswa->email;
            $this->data['provinsi'] = $dataSiswa->provinsi;
            $this->data['kota'] = $dataSiswa->kota;
            $this->data['desa'] = $dataSiswa->desa;
            $this->data['rt'] = $dataSiswa->rt;
            $this->data['rw'] = $dataSiswa->rw;
            $this->data['alamat'] = $dataSiswa->alamat;
            $this->data['nik_ayah'] = $dataSiswa->nik_ayah;
            $this->data['nama_ayah'] = $dataSiswa->nama_ayah;
            $this->data['pekerjaan_ayah'] = $dataSiswa->pekerjaan_ayah;
            $this->data['nik_ibu'] = $dataSiswa->nik_ibu;
            $this->data['nama_ibu'] = $dataSiswa->nama_ibu;
            $this->data['pekerjaan_ibu'] = $dataSiswa->pekerjaan_ibu;
            $this->data['provinsi_ortu'] = $dataSiswa->provinsi_ortu;
            $this->data['kota_ortu'] = $dataSiswa->kota_ortu;
            $this->data['desa_ortu'] = $dataSiswa->desa_ortu;
            $this->data['rt_ortu'] = $dataSiswa->rt_ortu;
            $this->data['rw_ortu'] = $dataSiswa->rw_ortu;
            $this->data['alamat_ortu'] = $dataSiswa->alamat_ortu;
        }
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
