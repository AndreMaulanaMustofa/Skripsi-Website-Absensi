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
                        <input type="text" class="form-control" name="text-search" placeholder="Cari Data" aria-label="Recipient's username" aria-describedby="button-addon2">
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
                                <a href="#">
                                    <button class="btn btn-info btn-sm">Info</button>
                                </a>
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
@endsection
