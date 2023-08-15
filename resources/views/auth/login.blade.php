@extends('layouts.app')

@section('content')
<div class="container-fluid p-4" style="background-color:#16498c">
    <div class="row">
        <div class="col-md-4">
            <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid" alt="logo smk" height="120" width="120">
            <p><h2 class="text-white"><strong>SMK SANGKURIANG</strong></h2></p>
            <p><h2 class="text-white"><strong>1 CIMAHI</strong></h2></p>
            
            <p class="text-white" style="font-size: 18px;">
                Sekolah swasta di Kota Cimahi yang sudah meluluskan <br>
                ribuan alumni dan sudah bekerja diperusahaan <br>
                yang bergengsi.
            </p>
        </div>
        <div class="col-md-4">
            <img src="{{URL::asset('/img/saly10@2x.png')}}" alt="logo smk" height="280" width="280">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card" style="position: absolute; z-index: 2; margin-top: 20;">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid" alt="logo smk" height="85" width="85"><br>
                        <span class="h4">Selamat Datang di <font style="color: #16498c;">SIPSI</font></span>
                        <br>
                        <span class="h2"><strong>LOGIN</strong></span>
                        <div class="row mb-3">
                            <label for="email">{{ __('Masukkan Username atau Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password">{{ __('Masukkan Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}
            
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
    <div class="row justify-content-center">
        <div class="col-md-8">
        </div>
    </div>
</div>
@endsection