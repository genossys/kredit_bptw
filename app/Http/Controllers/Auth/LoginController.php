<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use App\User;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    function logout(Request $r)
    {
        Auth::logout();
        return redirect('/');
    }


    function postlogin(Request $request)
    {
        $login_type = 'email';

        $request->merge([
            $login_type => $request->input('email')
        ]);

        if (Auth::attempt($request->only( $login_type , 'password'))) {
            $hakAkses = User::where('email',$request->input('email'))->first();
            if($hakAkses->hakAkses == 'admin'){
                return redirect('/admin');
            }else if($hakAkses->hakAkses == 'pimpinan'){
                return redirect('/bank');
            }else{
                return redirect('/');
            }

        } else {
            return redirect()->back()->with('gagal', 'user id/password salah');
        }
    }


}
