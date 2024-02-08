@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
    <div class="content-header ">
        <div class="container-fluid ">
            <h3 class="py-2">Edit Profil</h3>
            <div class="row">
                <div class="col-xl-3">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <center><div class="card-header bg-gradient-blue">Profile Picture</div></center>
                        <div class="card-body text-center">

                            <img class="img-account-profile rounded-circle mb-2" src="{{ asset('img/' . $user->imgProfile) }}" alt="" width="150px" data-toggle="modal" data-target="#profileModal">

                            <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="{{ asset('img/' . $user->imgProfile) }}" alt="Profile Picture" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="small mb-0"><h4>{{ $user->username }}</h4></div>
                            <div class="small text-muted  mb-4">{{ $user->email }}</div>

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle bg-gradient-blue border-0"  type="button" data-toggle="dropdown">Ubah Foto Profil
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu text-center pl-2 pr-2">
                                    <li>
                                        <a style="cursor: pointer;" class="text-primary" id="changeProfile">Ubah</a>
                                        <input type="file" id="img_profile" name="img_profile" style="display: none;">
                                    </li>
                                    <div class="line-hr-1 mt-2 mb-2"></div>
                                    <li><a href="#" class="text-danger">Hapus</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <center><div class="card-header bg-blue">Account Details</div></center>
                        <div class="card-body justify-content-center back-logo" style="background-size: 200px;">
                            <form action="#" method="post">
                                <!-- Form Row-->
                                @csrf
                                @method('PUT')
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control" id="email" type="text" name="email" value="{{ $user->email }}">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="username">Username</label>
                                        <input class="form-control" id="username" style="cursor:default;" type="text" name="username" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="fullName">Nama Lengkap</label>
                                <input class="form-control" id="fullName" type="text" name="namaLengkap" value="{{ $user->namaLengkap }}" >
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="prodi">Prodi</label>
                                        <input class="form-control" id="prodi" name="prodi" type="text" value="{{ $user->prodi }}" >
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="jurusan">Jurusan</label>
                                        <input class="form-control" id="jurusan" name="jurusan" type="text" value="{{ $user->jurusan }}" >
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="alamat">Alamat</label>
                                    <input class="form-control" id="alamat" name="detail" type="text" value="{{ $user->alamat }}" >
                                </div>
                                <!-- Save changes button-->
                                <center>
                                    <a href="#">
                                        <button class="btn btn-success pl-5 pr-5 mr-2" type="submit">Simpan</button>
                                    </a>
                                    <a href="{{ route('admin.data') }}">
                                        <button class="btn btn-danger pl-5 pr-5" type="button">Batal</button>
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
