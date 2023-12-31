<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view("auth.login");
    }

    public function login(Request $request){
        $infologin = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ],[
                'email.required' => 'Email tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin'){
                return redirect('/dashboard/admin');
            } elseif (Auth::user()->role == 'siswa') {
                return redirect('/dashboard/siswa');
            } else {
                $dataUser = User::where('email', $infologin['email'])->whereHas('guru', function ($query) {
                    $query->where('is_delete', 0);
                })->exists();

                if ($dataUser) {
                    if (Auth::user()->role == 'kurikulum'){
                        return redirect('/dashboard/kurikulum');
                    } elseif (Auth::user()->role == 'guru'){
                        return redirect('/dashboard/guru');
                    }
                } else {
                    Auth::logout();
                    return redirect()->back()->withErrors('User Tidak Ditemukan')->withInput();
                }
            }
        } else {
            return redirect()->back()->withErrors('Email atau Password Salah')->withInput();
        }

        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout(){
        Auth::logout();
        return redirect('');
    }

}
