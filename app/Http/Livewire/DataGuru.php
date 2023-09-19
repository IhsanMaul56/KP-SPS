<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_guru;
use Livewire\WithPagination;

class DataGuru extends Component
{
    public $search = '';
    public $nip, $namaGuru, $tempatLahir, $tanggalLahir, $jk, $agama, $noHP, $provinsi, $kota, $desa, $rt, $rw, $alamat;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.data-guru', [
            'dagur' => data_guru::where('nama_guru', 'like', '%'.$this->search.'%')->paginate(5)
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
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
            'rw' => 'required',
            'rt' => 'required',
            'alamat' => 'required',
        ]);

        data_guru::create([
            'nip' => $this->nip,
            'nama_guru' => $this->namaGuru,
            'tempat_lahir' => $this->tempatLahir,
            'tanggal_lahir' => $this->tanggalLahir,
            'jenis_kelamin' => $this->jk,
            'agama' => $this->agama,
            'no_hp' => $this->noHP,
            'provinsi' => $this->provinsi,
            'kota' => $this->kota,
            'desa' => $this->desa,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'alamat' => $this->alamat,
        ]);

        session()->flash('success', 'Data guru berhasil dibuat');
    }

    public function insert(){

    }

    public function showTambahGuru(){
        
    }
}
