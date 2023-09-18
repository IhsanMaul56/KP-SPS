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
        'alamat' => '',
        'no_hp' => ''
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
                    'alamat' => $this->data['alamat'],
                    'no_hp' => $this->data['no_hp'],
                ]);

            Session::flash('message', 'Data berhasil di update');
        }

        // $this->reset(['data']);
        $this->emit('refreshComponent');
    }

    public function mount()
    {
        $user = Auth::user();

        if ($user && $user->guru_id) {
            // Mengambil data dari database dan mengisi properti $data
            $guruData = DB::table('data_gurus')
                ->where('nip', $user->guru_id)
                ->first();

            if ($guruData) {
                $this->data['alamat'] = $guruData->alamat;
                $this->data['no_hp'] = $guruData->no_hp;
            }
        }
    }
}
