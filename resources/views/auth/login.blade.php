@extends('layouts.app')

@section('content')
<div class="container-fluid p-5" style="background-color:#16498c; height: 475px;">
    <div class="row">
        <div class="col-md-4" style="margin-left: 15px; margin-top: 30px;">
                <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mb-3" alt="logo smk" height="120" width="120" style="margin-top: -55px;">
                <h1 class="text-white"><strong>SMK SANGKURIANG</strong></h1>
                <h1 class="text-white mt-1"><strong>1 CIMAHI</strong></h1>
            <br>
            <p class="text-white" style="font-size: 18px; margin-top: 19px;">
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
            <div class="card" style="position: absolute; z-index: 2; margin-right: 57px; width: 455px; height: 586px; left: 1350px; bottom: 191px;">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mt-3 mb-4" alt="logo smk" height="98" width="98" style="margin-left: 15px;"><br>
                        <span class="h4">Selamat Datang di <strong style="color: #16498c;">SIPSI</strong></span>
                        <br>
                        <span class="h1"><strong>LOGIN</strong></span>
                        <div class="row mb-3">
                            <label for="email">{{ __('Masukkan Username atau Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Username or Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password">{{ __('Masukkan Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
            
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
            
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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