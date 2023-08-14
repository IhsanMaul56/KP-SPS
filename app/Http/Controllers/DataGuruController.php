<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataGuruController extends Controller
{
    function index() {
        return view('data_guru');
    }
}
