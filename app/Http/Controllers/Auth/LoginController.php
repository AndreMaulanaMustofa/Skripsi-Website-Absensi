<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index(){
        $title = "Login";

        return view('Auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $login = $request->input('email');

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $userLogin = User::where('email', $login)->first();

            if ($userLogin) {
                if (Hash::check($request->input('password'), $userLogin->password)) {
                    return redirect()->route('mahasiswa.view');
                } else {
                    return back()->withErrors([
                        'fail-login' => 'error',
                    ]);
                }
            } else {
                return back()->withErrors([
                    'email' => 'error',
                ]);
            }
        }
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();

        return redirect()->route('Login.acc');
    }
}
