@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
    <div class="content-header layout">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <h3 class="mb-3 ">Akun Mahasiswa</h3>
                <div class="col-md-9">
                    <button class="btn btn-outline-primary mr-2">
                        <i class="fa-solid fa-filter"></i> Online
                    </button>
                    <button class="btn btn-outline-danger mr-2">
                        <i class="fa-solid fa-filter"></i> Offline
                    </button>
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
                                <th scope="col">NIM</th>
                                <th scope="col">Password</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Tahun Masuk</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @forelse($mahasiswa as $key => $j)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $j->NIM }}</td>
                                <td>{{ $j->password }}</td>
                                <td>{{ $j->namaLengkap }}</td>
                                <td>{{ $j->Kelas }}</td>
                                <td>{{ $j->tahunMasuk }}</td>
                                <td>
                                    @if($j->Status == "Offline")
                                        <button class="btn btn-danger btn-sm">Offline</button>
                                    @elseif($j->Status == "Online")
                                        <button class="btn btn-success btn-sm">Online</button>
                                    @endif
                                </td>
                                @empty
                                <td colspan="7">Data Tidak Ada!</td>
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
