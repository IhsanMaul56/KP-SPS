<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\data_guru;
use Illuminate\Http\Request;

class DataGuruController extends Controller
{
    function index() {
        $dataGuru= data_guru::all();
        return view('layouts.dashboard', ['gurus' => $dataGuru]);
    }
}
