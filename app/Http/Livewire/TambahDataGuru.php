<?php

namespace App\Http\Livewire;

use App\Models\data_guru;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class TambahDataGuru extends Component
{
    public $nip, $nama_guru, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $no_hp, $provinsi, $kota, $desa, $rt, $rw, $alamat;

    public function render()
    {
        return view('livewire.tambah-data-guru');
    }

    public function store(){
        $this->validate([
            'nip' => 'required',
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

        Session::flash('berhasil', 'Data Berhasil Dimasukan');

        $this->resetForm();
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
