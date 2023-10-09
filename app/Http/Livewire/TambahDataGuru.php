<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_guru;
use App\Models\User;
use Illuminate\Http\Request;

class TambahDataGuru extends Component
{
    public $nip, $nama_guru, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $no_hp, $provinsi, $kota, $desa, $rt, $rw, $alamat;
    public $email;

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
            'nip.required' => 'NIP harus diisi.',
            'nip.unique' => 'NIP sudah ada dalam database.',
            'nama_guru.required' => 'Nama guru harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'agama.required' => 'Agama harus diisi',
            'no_hp.required' => 'No HP harus diisi',
            'provinsi.required' => 'Provinsi harus diisi',
            'kota.required' => 'Kota harus diisi',
            'desa.required' => 'Desa harus diisi',
            'rt.required' => 'Rt harus diisi',
            'rw.required' => 'Rw harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah ada dalam database',
        ]);

        // dd($request);

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

        session()->flash('berhasil', 'Data guru berhasil disimpan.');
        
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
}