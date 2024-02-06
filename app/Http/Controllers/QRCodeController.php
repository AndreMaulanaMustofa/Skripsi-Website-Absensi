<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;

class QRCodeController extends Controller
{
    public function index(){
        $title = "QR Code Generator";
        $mhs = mahasiswa::all();

        return view('qrCode.qrcode', compact('title','mhs'));
    }
}