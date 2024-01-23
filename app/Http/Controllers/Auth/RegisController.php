<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisController extends Controller
{
    public function index(){
        $title = "Registrasi";

        return view('Auth.login', compact('title'));
    }
}
