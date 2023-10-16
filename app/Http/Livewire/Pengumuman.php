<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pengumuman extends Component
{
    
    public function render()
    {
        $user = Auth::user();

        if($user='admin_id'){
            return view('livewire.pengumuman');
        }else if($user='kurikulum_id'){
            return view('livewire.pengumuman');
        }else if($user='guru_id'){
            return view('livewire.pengumuman');
        }else if($user='siswa_id'){
            return view('livewire.pengumuman');
        }else{
            // return view('livewire.pengumuman');
        }
        // return view('livewire.pengumuman');
    }

    public function createPengumuman()
    {

    }

    public function updatePengumuman()
    {

    }
    
}
