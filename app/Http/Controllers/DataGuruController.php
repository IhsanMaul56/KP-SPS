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

    function coba() {
        return DataTables::eloquent(data_guru::query())->toJson();
    }
}
