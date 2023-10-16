@extends('layouts.app')

@section('content')
<div class="container-fluid p-3 utama">
    <div class="row">
        <div class="col-md-4 jarak-kiri ms-5 mt-4">
                <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mb-3" alt="logo smk" height="125" width="125">
                <h1 class="text-white fw-bold">SMK SANGKURIANG</h1>
                <h1 class="text-white mt-1 fw-bold">1 CIMAHI</h1>
            <br>
            <p class="text-white fs-5 jarak-atas" style="display: flex">
                Sekolah swasta di Kota Cimahi yang sudah meluluskan <br>
                ribuan alumni dan sudah bekerja diperusahaan <br>
                yang bergengsi.
            </p>
        </div>
        <div class="col-md-4 ms-3 ">
            <img src="{{URL::asset('/img/saly10@2x.png')}}" alt="logo smk" height="455" width="455">
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

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row mb-4 mt-4">
                            <label for="email" class="mb-2">{{ __('Masukkan Email Address') }}</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <label for="password" class="mb-2">{{ __('Masukkan Password') }}</label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                <span class="input-group-text" id="showPasswordToggle"><i class="bi bi-eye"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4 justify-content-end">
                            <div class="col-md-8 mb-2 d-flex justify-content-end">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration:none">
                                        {{ __('Lupa Password') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-8 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary fw-bold text-white fs-5 px-5 mb-5" style="background-color: #16498c; border-color: #16498c;">
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

<div class="container-fluid mt-4">
    <img src="{{URL::asset('/img/pemanis.png')}}" class="img-fluid mb-3" alt="logo smk" width="64%">
</div>
@endsection