<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\data_guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TambahDataGuru extends Component
{
    public $nip, $nama_guru, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $no_hp, $provinsi, $kota, $desa, $rt, $rw, $alamat;
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
        'rt' => '',
        'rw' => '',
        'alamat' => '',
        'email' => '',
    ];

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

        return redirect()->back();
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
            ->where('data_gurus.nip', '=', $nip)
            ->select(
                'users.email',
                'data_gurus.*'
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
                'desa' => $request->desa,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'alamat' => $request->alamat,
                'email' => $request->email,
            ]);
        
        Session::flash('berhasil', 'Data Berhasil Diupdate');
        return redirect()->back();
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
                $this->data['desa'] = $dataGuru->desa;
                $this->data['rt'] = $dataGuru->rt;
                $this->data['rw'] = $dataGuru->rw;
                $this->data['alamat'] = $dataGuru->alamat;
                $this->data['email'] = $dataGuru->email;
            }
    }
}