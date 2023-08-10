<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        return view('dashboardadmin');
    }

    function guru(){
        return view('dashboardguru');
    }

    function kurikulum(){
        return view('dashboardkurikulum');
    }

    function siswa(){
        return view('dashboardsiswa');
    }
}
