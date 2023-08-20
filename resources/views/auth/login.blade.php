@extends('layouts.app')

@section('content')
<div class="container-fluid p-5" style="background-color:#16498c; height: 475px;">
    <div class="row">
        <div class="col-md-4 jarak-kiri">
                <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mb-3" alt="logo smk" height="120" width="120" style="margin-top: -55px;">
                <h1 class="text-white fw-bold">SMK SANGKURIANG</h1>
                <h1 class="text-white mt-1 fw-bold">1 CIMAHI</h1>
            <br>
            <p class="text-white fs-5 jarak-atas">
                Sekolah swasta di Kota Cimahi yang sudah meluluskan <br>
                ribuan alumni dan sudah bekerja diperusahaan <br>
                yang bergengsi.
            </p>
        </div>
        <div class="col-md-4">
            <img src="{{URL::asset('/img/saly10@2x.png')}}" alt="logo smk" height="455" width="455" style="margin-left: 40px; margin-top: -5%;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-login">
                <div class="card-body jarak-kiri me-4 ms-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mt-3 mb-4" alt="logo smk" height="98" width="98"><br>
                        <span class="h4">Selamat Datang di <strong class="text-biru">SIPSI</strong></span>
                        <br>
                        <span class="h1 fw-bold mb-5">LOGIN</span>
                        <div class="row mb-4 mt-4">
                            <label for="email" class="mb-2">{{ __('Masukkan Username atau Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Username atau Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="row mb-3">
                            <label for="password" class="mb-2">{{ __('Masukkan Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
            
                        <div class="row mb-5 justify-content-end">
                            <div class="col-md-8 mb-1 d-flex justify-content-end">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration:none">
                                        {{ __('Lupa Password') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-end ">
                            <div class="col-md-8 d-flex justify-content-end ">
                                <button type="submit" class="btn btn-navy fw-bold text-white fs-5 px-5">
                                    {{ __('LOGIN') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <img src="{{URL::asset('/img/pemanis.png')}}" class="img-fluid mb-3" alt="logo smk" width="64%" style="margin-top: 40px;">
</div>
@endsection