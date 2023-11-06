<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pengumuman extends Component
{
    public $content;

    
    public function index(){
        return view('livewire.pengumuman');
    }

    public function render()
    {
        return view('livewire.component-editor');
    }

    public function store(Request $request)
    {
        // $array=[];
        // $data=
    }
}
