<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    Public function indexPassword(){
        $title = "Ubah Password";
        
        return view('pengaturan.password', compact('title'));
    }
}
