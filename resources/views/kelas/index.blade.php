@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
    <div class="content-header layout">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <h3 class="mb-3 ">Data Kelas</h3>
                <div class="col-md-9">
                    <a href="{{ route('kelas.create') }}">
                        <button class="btn btn-outline-primary mr-2">
                            <i class="fa-solid fa-plus"></i> Tambahkan
                        </button>
                    </a>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" id="searchInput" placeholder="Cari Data">
                    </div>
                </div>
            </div>
            <div class="tbl-container">
                <div class="row scroll">
                    <table class="table align-middle">
                        <thead>
                            <tr class="text-center bg-dark">
                                <th scope="col">No</th>
                                <th scope="col">Ruang Kelas</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Nama_DPA</th>
                                <th scope="col">Jumlah Mahasiswa</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($kelas as $key => $k)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $k->kelas }}</td>
                                <td>{{ $k->jurusan }}</td>
                                <td>{{ $k->sks }}</td>
                                <td>{{ $k->nama_DPA }}</td>
                                <td>{{ $jumlahMahasiswa }}</td>
                                <td>
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
