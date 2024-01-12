@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
    <div class="content-header">
        <div class="container-fluid ">
            <h3 class="py-2">Pengaturan Profil</h3>
            <div class="row">
                <div class="col-xl-3">
                    <div class="card mb-4 mb-xl-0">
                        <center><div class="card-header bg-blue">Profile Picture</div></center>
                        <div class="card-body text-center">
                            <img class="img-account-profile rounded-circle mb-2" src="{{ asset('img/polinema_logo.png') }}" alt="" width="150px" data-toggle="modal" data-target="#profileModal">
                            <div class="small mb-0"><h4>Admin JTI</h4></div>
                            <div class="small text-muted  mb-4">jtipolinema@gmail.com</div>
                        </div>
                    </div>
                </div>

                    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset('img/polinema_logo.png') }}" alt="Profile Picture" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-xl-9">
                    <div class="card mb-4 back-logo" style="background-size: 200px;">
                        <center><div class="card-header bg-blue">Account Details</div></center>
                        <div class="card-body justify-content-center">
                            <form>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control input-akun" id="email" type="text" value="jtipolinema@gmail.com" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="username">Username</label>
                                        <input class="form-control input-akun" id="username" type="text" value="Admin JTI" disabled>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="fullName">Nama Lengkap</label>
                                <input class="form-control input-akun" id="fullName" type="text" value="Admin Jurusan Teknologi Informasi" disabled>
                                </div>

                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="province">Prodi</label>
                                        <input class="form-control input-akun" id="province" type="text" value="D4 Teknik Informatika" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="city">Jurusan</label>
                                        <input class="form-control input-akun" id="city" type="text" value="Teknologi Informasi" disabled>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="fullName">Alamat</label>
                                <input class="form-control input-akun" id="fullName" type="text" value="Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141" disabled>
                                </div>

                                <center>
                                    <a href="{{ route('admin.edit') }}">
                                        <button class="btn btn-primary pl-5 pr-5" type="button">
                                            Edit
                                        </button>
                                    </a>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
