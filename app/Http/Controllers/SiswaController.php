<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_siswa;

class SiswaController extends Controller
{
    function index() {
        return view('siswa');
    }

    public function edit($nis){
        
        $siswa = data_siswa::where('nis', $nis);
        return view('livewire.akun-siswa',[
            'siswa' => $siswa
        ]);
    }
}