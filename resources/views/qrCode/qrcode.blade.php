@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white; margin-top: 120px;">
    <div class="content-header layout">
        <div class="container-fluid">
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="container mt-5" style="background-color: white; width: 60%; height: 100%;">
                    <br>

                    @error('error')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <div class="message">
                                <span class="text-red-500">{{$message = "Current Password Salah! Silahkan Coba Lagi."}}</span>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror

                    <div class="container border text-center" style="width: 50%; height: 80%; ">
                        <div class="row mt-3">
                            <div class="row mb-2 mt-2">
                                <h3>QR Code Generate</h3>
                            </div>
                        </div>
                        <div class="container border d-flex align-items-center" style="width: 200px; height: 200px">
                            {{-- Hasil Generate QR Code nya disini --}}
                            <img src="{{ asset('img/qrcode.png') }}" width="180px">
                        </div>
                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-3">
                                <button style="width: 100%; margin-bottom: 13px; background-color:red; border:none; color:white; height: 40px;">PNG <i class="fa fa-download"></i></button>
                            </div>
                            <div class="col-3">
                                <button style="width: 100%; margin-bottom: 13px; background-color:#42BB72; border:none; color:white; height: 40px;">Generate <i class="fa fa-qrcode"></i></button>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
