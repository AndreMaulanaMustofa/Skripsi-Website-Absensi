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
        $user = Auth::guard('admin')->user();

        return view('pengaturan.index', compact('title', 'user'));
    }

    public function edit(){
        $title = "Edit Pengaturan";
        $user = Auth::guard('admin')->user();

        return view('pengaturan.edit', compact('title', 'user'));
    }

    Public function indexPassword(){
        $title = "Ubah Password";
        $data = Auth::guard('admin')->user();

        return view('pengaturan.password', compact('title', 'data'));
    }

    public function updatePassword(Request $request, $id){
        $user = User::find($id);

        $currentPass = $request->input('curPass');
        $passwordBaru = $request->input('newPass');
        $passwordRepeat = $request->input('repNewPass');

        if (Hash::check($currentPass, $user->password)) {
            if ($passwordBaru == $passwordRepeat) {
                $user->password = Hash::make($passwordBaru);
                $user->update();

                return back()->withErrors([
                    'ubah-success' => 'success'
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
