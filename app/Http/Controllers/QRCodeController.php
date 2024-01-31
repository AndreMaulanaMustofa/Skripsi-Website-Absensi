<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function index(){
        $title = "QR Code Generator";

        return view('qrCode.qrcode', compact('title'));
    }
}
