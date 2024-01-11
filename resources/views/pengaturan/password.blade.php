@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
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

                    <div class="container border" style="width: 90%; height: 80%; ">
                        <div class="row mt-3">
                            <div class="row mb-2 mt-2">
                                <h3>Ubah Password</h3>
                            </div>
                        </div>
                        <div class="row mt-4 ml-1">
                            <div class="col-4 mt-2">
                                New Password
                            </div>
                            <div class="col-8">
                                <input type="password" id="newPass" name="newPass" class="form-control input-password" placeholder="Masukkan Password Baru" required>
                            </div>
                        </div>
                        <div class="row mt-4 ml-1">
                            <div class="col-4 mt-2">
                                Repeat Password
                            </div>
                            <div class="col-8">
                                <input type="password" id="repNewPass" name="repNewPass" class="form-control input-password" placeholder="Ulangi Masukkan Password Baru" required>
                            </div>
                        </div>
                        <div class="row mt-4 ml-1">
                            <div class="col-4 mt-2" >
                                Current Password
                            </div>
                            <div class="col-8 ">
                                <input type="password" id="curPass" name="curPass" class="form-control input-password" placeholder="Masukkan Password saat ini" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-9" style="color: black;"></div>
                            <div class="col-3">
                                <button type="submit" style="width: 100%; margin-bottom: 13px; background-color:#42BB72; border:none; color:white; height: 40px">Simpan <i class="fa fa-save"></i></button>
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
