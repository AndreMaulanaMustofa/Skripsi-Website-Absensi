<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $title = "Pengaturan";

        return view('pengaturan.index', compact('title'));
    }

    public function edit(){
        $title = "Edit Pengaturan";

        return view('pengaturan.edit', compact('title'));
    }

    Public function indexPassword(){
        $title = "Ubah Password";

        return view('pengaturan.password', compact('title'));
    }

    public function updatePassword(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);

        $passwordBaru = $request->input('newPass');
        $passwordRepeat = $request->input('repNewPass');
        $currentPass = $request->input('curPass');

        if (Hash::check($currentPass, $user->password)) {
            if ($passwordBaru == $passwordRepeat) {
                $user->password = Hash::make($passwordBaru);
                $user->update();

                return back()->withErrors([
                    'ubah-success' => 'success',
                ]);
            }else{
                return back()->withErrors([
                    'ubah-notSame' => 'error',
                ]);
            }
        } else {
            return back()->withErrors([
                'ubah-fail' => 'Password saat ini salah!, Silahkan coba lagi.',
            ]);
        }
    }
}
