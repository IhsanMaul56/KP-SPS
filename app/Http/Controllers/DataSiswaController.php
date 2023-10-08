<?php

namespace App\Http\Controllers;

use App\Models\data_siswa;
use App\Http\Requests\Storedata_siswaRequest;
use App\Http\Requests\Updatedata_siswaRequest;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard');
    }

    public function profile()
    {
        return view('layouts.siswa-profile');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storedata_siswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(data_siswa $data_siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(data_siswa $data_siswa)
    {
        return view('layouts.dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedata_siswaRequest $request, data_siswa $data_siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(data_siswa $data_siswa)
    {
        //
    }
}
