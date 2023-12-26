@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
    <div class="content-header layout">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <h3 class="mb-3 ">Data Mahasiswa</h3>
                <div class="col-md-9">
                    <div class="dropdown ml-1">
                        <button class="btn btn-outline-primary mr-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-plus"></i> Tambahkan
                        </button>
                        <ul class="dropdown-menu text-left">
                            <li><a class="dropdown-item" href="#">Kelas</a></li>
                            <li><a class="dropdown-item" href="#">Tahun Masuk</a></li>
                            <li><a class="dropdown-item" href="#">Jenis Kelamin</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="searchInput" name="text-search" placeholder="Cari Data">
                    </div>
                </div>
            </div>
            <div class="tbl-container">
                <div class="row scroll">
                    <table class="table align-middle">
                        <thead>
                            <tr class="text-center bg-dark">
                                <th scope="col">NIM</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No telp</th>
                                <th scope="col">Tahun Masuk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($mahasiswa as $m)
                            <tr>
                                <td>{{ $m->NIM }}</td>
                                <td>{{ $m->namaLengkap }}</td>
                                <td>{{ $m->Kelas }}</td>
                                <td>{{ $m->jenisKelamin }}</td>
                                <td>{{ $m->NoTelp }}</td>
                                <td>{{ $m->tahunMasuk }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#infoMahasiswa{{ $m->id }}">Info</button>

                                    <div class="modal animate__animated animate__zoomIn animate__faster" id="infoMahasiswa{{ $m->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="infoMahasiswaLabel">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="infoMahasiswaLabel">Data {{ $m->namaLengkap }}</h1>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Data Mahasiswa
                                                            <hr style="border-color: #4056F4; border-width: 3px; opacity:inherit;">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <p class="text-left">NIM:</p>
                                                                    <p class="text-left">Nama Lengkap:</p>
                                                                    <p class="text-left">Kelas:</p>
                                                                    <p class="text-left">Nomor Telepon:</p>
                                                                    <p class="text-left">Tahun Masuk:</p>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <p class="text-left">{{ $m->NIM }}</p>
                                                                    <p class="text-left">{{ $m->namaLengkap }}</p>
                                                                    <p class="text-left">{{ $m->Kelas }}</p>
                                                                    <p class="text-left">{{ $m->NoTelp }}</p>
                                                                    <p class="text-left">{{ $m->tahunMasuk }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            Data Ortu
                                                            <hr style="border-color: #470FF4; border-width: 3px; opacity:inherit;">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <p class="text-left">Nama Ayah:</p>
                                                                    <p class="text-left">Nomor HP Ayah:</p>
                                                                    <p class="text-left">Nama Ibu:</p>
                                                                    <p class="text-left">Nomor HP Ibu:</p>
                                                                    <p class="text-left">Domisili:</p>
                                                                </div>
                                                                <div class="col-md-7" >
                                                                    <p class="text-left">{{ $m->nama_Ayah }}</p>
                                                                    <p class="text-left">{{ $m->NoTelp_Ayah }}</p>
                                                                    <p class="text-left">{{ $m->nama_Ibu }}</p>
                                                                    <p class="text-left">{{ $m->NoTelp_Ibu }}</p>
                                                                    <p class="text-left">{{ $m->Domisili }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#">
                                        <button class="btn btn-success btn-sm">Edit</button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </a>
                                </td>
                                @empty
                                <td colspan="7">Data Tidak Ditemukan / Kosong!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    mencariData();
</script>
@endsection
