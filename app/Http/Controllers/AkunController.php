<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
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
}
