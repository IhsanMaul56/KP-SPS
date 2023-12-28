<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\data_guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TambahDataGuru extends Component
{
    public $nip, $nama_guru, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $no_hp, $rt, $rw, $alamat;
    public $provinsi;
    public $provinces;
    public $kota;
    public $citys;
    public $kecamatan;
    public $districts;
    public $desa;
    public $villages;
    public $email;
    public $data = [
        'nip' => '',
        'nama_guru' => '',
        'tempat_lahir' => '',
        'tanggal_lahir' => '',
        'jenis_kelamin' => '',
        'agama' => '',
        'no_hp' => '',
        'provinsi' => '',
        'kota' => '',
        'desa' => '',
        'kecamatan' => '',
        'rt' => '',
        'rw' => '',
        'alamat' => '',
        'email' => '',
    ];

    public function changeProvince($provinceCode)
    {
        $this->kota = null;
        $this->kecamatan = null;
        $this->desa = null;

        $this->citys = Regency::where('province_id', $provinceCode)->get();
    }

    public function changeCity($cityCode)
    {
        $this->kecamatan = null;
        $this->desa = null;

        $this->districts = District::where('regency_id', $cityCode)->get();
    }

    public function changeDistrict($districtCode)
    {
        $this->desa = null;

        $this->villages = Village::where('district_id', $districtCode)->get();
    }

    public function render()
    {
        return view('livewire.tambah-data-guru');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:data_gurus,nip',
            'nama_guru' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'no_hp' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email',
        ], [
            'nip.required' => 'NIP Harus Diisi',
            'nip.unique' => 'NIP Sudah Ada Dalam Database',
            'nama_guru.required' => 'Nama Guru Harus Diisi',
            'tempat_lahir.required' => 'Tempat Lahir Harus Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus Diisi',
            'agama.required' => 'Agama Harus Diisi',
            'no_hp.required' => 'No. HP Harus Diisi',
            'provinsi.required' => 'Provinsi Harus Diisi',
            'kota.required' => 'Kota Harus Diisi',
            'desa.required' => 'Desa Harus Diisi',
            'kecamatan.required' => 'Kecamatan Harus Diisi',
            'rt.required' => 'Rt Harus Diisi',
            'rw.required' => 'Rw Harus Diisi',
            'alamat.required' => 'Alamat Harus Diisi',
            'email.required' => 'Format Email Tidak Valid',
            'email.unique' => 'Email Sudah Ada Dalam Database',
        ]);

        data_guru::create([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'no_hp' => $request->no_hp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat' => $request->alamat,
        ]);

        User::create([
            'name' => ucwords($request->nama_guru),
            'email' => strtolower($request->email),
            'password' => bcrypt('12345'),
            'role' => 'guru',
            'guru_id' => $request->nip,
        ]);

        session()->flash('berhasil', 'Data Berhasil Ditambahkan');
        
        $this->resetForm();

        return redirect()->route('master-guru');
    }

    private function resetForm()
    {
        $this->nip = '';
        $this->nama_guru = '';
        $this->tempat_lahir = '';
        $this->tanggal_lahir = '';
        $this->jenis_kelamin = '';
        $this->agama = '';
        $this->no_hp = '';
        $this->email = '';
        $this->provinsi = '';
        $this->kota = '';
        $this->desa = '';
        $this->rt = '';
        $this->rw = '';
        $this->alamat = '';
    }

    public function viewUpdate($nip)
    {
        $guru = DB::table('users')
            ->leftJoin('data_gurus', 'users.guru_id', '=', 'data_gurus.nip')
            ->leftJoin('provinces', 'data_gurus.provinsi', 'provinces.id')
            ->leftJoin('regencies', 'data_gurus.kota', 'regencies.id')
            ->leftJoin('districts', 'data_gurus.kecamatan', 'districts.id')
            ->leftJoin('villages', 'data_gurus.desa', 'villages.id')
            ->where('data_gurus.nip', '=', $nip)
            ->select(
                'users.email',
                'data_gurus.*',
                'provinces.name as provinsi_nama',
                'regencies.name as kota_nama',
                'districts.name as kecamatan_nama',
                'villages.name as desa_nama',
            )
            ->first();

        if ($guru) {
            return view('livewire.update-data-guru')->with('guru', $guru);
        } else {
            session()->flash('gagal', 'Guru tidak ditemukan.');
        }
    }

    public function update(Request $request)
    {
        DB::table('users')
            ->leftJoin('data_gurus', 'users.guru_id', '=', 'data_gurus.nip')
            ->where('data_gurus.nip', '=', $request->nip)
            ->update([
                'nip' => $request->nip,
                'nama_guru' => $request->nama_guru,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'no_hp' => $request->no_hp,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'desa' => $request->desa,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'alamat' => $request->alamat,
                'email' => $request->email,
            ]);
        
        Session::flash('berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('master-guru');
        $this->emit('refreshComponent');
    }

    public function mount()
    {
        $dataGuru = DB::table('users')
            ->leftJoin('data_gurus', 'users.guru_id', '=', 'data_gurus.nip')
            ->select(
                'users.email',
                'data_gurus.*'
            )
            ->first();

            if($dataGuru){
                $this->data['nip'] = $dataGuru->nip;
                $this->data['nama_guru'] = $dataGuru->nama_guru;
                $this->data['tempat_lahir'] = $dataGuru->tempat_lahir;
                $this->data['tanggal_lahir'] = $dataGuru->tanggal_lahir;
                $this->data['jenis_kelamin'] = $dataGuru->jenis_kelamin;
                $this->data['agama'] = $dataGuru->agama;
                $this->data['no_hp'] = $dataGuru->no_hp;
                $this->data['provinsi'] = $dataGuru->provinsi;
                $this->data['kota'] = $dataGuru->kota;
                $this->data['kecamatan'] = $dataGuru->kecamatan;
                $this->data['desa'] = $dataGuru->desa;
                $this->data['rt'] = $dataGuru->rt;
                $this->data['rw'] = $dataGuru->rw;
                $this->data['alamat'] = $dataGuru->alamat;
                $this->data['email'] = $dataGuru->email;
            }

        $this->provinces = Province::all();
    }
}