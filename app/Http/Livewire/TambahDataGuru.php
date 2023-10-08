<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_guru;
use Illuminate\Support\Facades\Log;

class TambahDataGuru extends Component
{
    public $nip, $nama_guru, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $no_hp, $provinsi, $kota, $desa, $rt, $rw, $alamat;

    public function render()
    {
        return view('livewire.tambah-data-guru');
    }

    public function store()
    {
        $this->validate([
            'nip' => 'required|unique:data_guru,nip',
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
        ]);

        data_guru::create([
            'nip' => $this->nip,
            'nama_guru' => $this->nama_guru,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'no_hp' => $this->no_hp,
            'provinsi' => $this->provinsi,
            'kota' => $this->kota,
            'desa' => $this->desa,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'alamat' => $this->alamat,
        ]);

        session()->flash('berhasil', 'Data guru berhasil disimpan.');
        
        $this->resetForm();

        dd([
            'nip' => $this->nip,
            'nama_guru' => $this->nama_guru,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'no_hp' => $this->no_hp,
            'provinsi' => $this->provinsi,
            'kota' => $this->kota,
            'desa' => $this->desa,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'alamat' => $this->alamat,
        ]);
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
        $this->provinsi = '';
        $this->kota = '';
        $this->desa = '';
        $this->rt = '';
        $this->rw = '';
        $this->alamat = '';
    }
}