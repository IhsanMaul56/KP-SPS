    @extends('layouts.app')

    @section('content')
        <div class="container-fluid">
            @include('partials.sidebar')
            <div class="col-md-4">
                <div class="grid-tengah">
                    <div class="row p-4">
                        <div class="col-md-8">
                            <span class="h1 p-4"><strong style="color: #16498c">Beranda</strong></span>
                        </div>
                        <div class="col-md-4 ">
                            <span class="h5 text-right">Selamat Datang,</span><br>
                            <span class="h4"><strong>{{ Auth::user()->name }}</strong></span>
                        </div>
                    </div>

                    <div class="card-tengah" id="shadow">
                        <div class="card-body">
                            <div class="persegi">
                                <p class="text-white">Semester Ganjil</p>
                            </div>
                            <div class="persegi2">
                                <p class="text-white">X RPL 1</p>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <div class="card-tengah" id="shadow">
                    <div class="card-body">
                        <div class="persegi">
                            <p class="text-white">Semester Ganjil</p>
                        </div>
                        <div class="persegi2">
                            <p class="text-white">X RPL 1</p>
                        </div>
                        <table border="2" cellpadding="10" height="80%">
                            <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th width="58%" style="text-align: center">Mata Pelajaran</th> 
                                <th style="text-align: center">Kelas</th>
                                <th style="text-align: center">Waktu</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="text-align: center">1</td>
                                <td>RPL</td>
                                <td style="text-align: center">X RPL 1</td>
                                <td style="text-align: center">Selasa, 07.00 - 09.00</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">2</td>
                                <td>Pemrograman Objek</td>
                                <td style="text-align: center">X RPL 1</td>
                                <td style="text-align: center">Selasa, 07.00 - 09.00</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">3</td>
                                <td>Multimedia</td>
                                <td style="text-align: center">X RPL 1</td>
                                <td style="text-align: center">Selasa, 07.00 - 09.00</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">4</td>
                                <td>Pemodelan Perangkat Lunak</td>
                                <td style="text-align: center">X RPL 1</td>
                                <td style="text-align: center">Selasa, 07.00 - 09.00</td>
                            </tr>
                            <tr>
                                <td style="text-align: center">5</td>
                                <td>Cloud Computing</td>
                                <td style="text-align: center">X RPL 1</td>
                                <td style="text-align: center">Selasa, 07.00 - 09.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <div class="col">
                    <div class="grid-kanan">
                        <div class="row">
                            <div class="col">
                                <i class="bi bi-gear"></i>
                            </div>
                            <div class="col">
                                <span><strong>NIS</strong></span><br>
                                <span>{{ Auth::user()->name }}</></span>

                                <div class="card-kanan" id="shadow">
                                    <div class="card-body">
                                        <p>Pengumuman</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>

    {{-- @endsection --}}
                    {{-- <h1 class="font">Beranda</h1>

    @endsection

                    <h1 class="font">Beranda</h1>

                </div>
                <div class="card" style="position: absolute; z-index: 2;  width: 696px; height: 449px; bottom: 191px; top: 100px">
                    <div class="card-body">
                        <div class="row" style="position: right">
                            <span>Semester Ganjil</span>
                        </div>
                    </div>
                </div>
            </div>

            <<div class="grid-kanan">
                <div class="">
                    
                </div>
            </div>

    </div> --}}
@endsection
