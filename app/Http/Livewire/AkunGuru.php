<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AkunGuru extends Component
{
    public $guru;
    public $akun;

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
}
