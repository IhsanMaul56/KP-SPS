<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function index(){
        return view("login");
    }

    function login(Request $request){
        $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ],[
            "nip.required" =>"NIP tidak boleh kosong",
            "password.required" =>"Password tidak boleh kosong",
        ]);

        $infologin = [
            'nip' => $request->nip,
            'password'=> $request->password
        ];

        if (Auth::attempt($infologin)) {
            echo "sukses";
            exit();
        }else{
            return redirect('')->withErrors('Username dan Password yang dimasukan salah')->withInput();
        }
    }
}
