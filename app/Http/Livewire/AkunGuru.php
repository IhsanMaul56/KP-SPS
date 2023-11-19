<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AkunGuru extends Component
{
    public $guru;
    public $akun;
    public $data = [
        'no_hp' => '',
        'provinsi' => '',
        'kota' => '',
        'desa' => '',
        'rt' => '',
        'rw' => '',
        'alamat' => ''
    ];

    public function render()
    {
        $user = Auth::user();

        if($user && $user->guru_id){
            $this->guru = DB::table('users')
                ->where('id', $user->id)
                ->value('email');
            
            if ($this->guru){
                $this->akun = DB::table('data_gurus')
                    ->where('nip', $user->guru_id)
                    ->get();
            }
        }
        
        return view('livewire.akun-guru');
    }

    public function update()
    {
        $user = Auth::user();

        if($user && $user->guru_id){
            DB::table('data_gurus')
                ->where('nip', $user->guru_id)
                ->update([
                    'no_hp' => $this->data['no_hp'],
                    'provinsi' => $this->data['provinsi'],
                    'kota' => $this->data['kota'],
                    'desa' => $this->data['desa'],
                    'rt' => $this->data['rt'],
                    'rw' => $this->data['rw'],
                    'alamat' => $this->data['alamat'],
                ]);

            Session::flash('message', 'Data Berhasil Diupdate');
        }

        $this->emit('refreshComponent');
    }

    public function mount()
    {
        $user = Auth::user();

        if ($user && $user->guru_id) {
            $guruData = DB::table('data_gurus')
                ->where('nip', $user->guru_id)
                ->first();

            if ($guruData) {
                $this->data['no_hp'] = $guruData->no_hp;
                $this->data['provinsi'] = $guruData->provinsi;
                $this->data['kota'] = $guruData->kota;
                $this->data['desa'] = $guruData->desa;
                $this->data['rt'] = $guruData->rt;
                $this->data['rw'] = $guruData->rw;
                $this->data['alamat'] = $guruData->alamat;
            }
        }
    }

    public function tampilGuru(){
        return view('partials.guru-profile');
    }
}
