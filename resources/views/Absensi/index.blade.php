@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
    <div class="content-header layout">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <h3 class="mb-3 ">Data Absensi</h3>
                <div class="col-md-9">
                    <button class="btn btn-outline-primary mr-2" id="dateFilter">
                        <i class="fa-solid fa-calendar"></i> Berdasarkan Tanggal
                    </button>
                    <script>
                        document.getElementById('dateFilter').addEventListener("click", function(){
                            flatpickr("#dateFilter", {
                                enableTime: false,
                                dateFormat: "Y-m-d",
                            });
                        });
                    </script>
                    <div class="btn-group">
                        <button class="btn btn-outline-danger mr-2" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 5px">
                            <i class="fa-solid fa-clipboard-check"></i> Berdasarkan Status
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Terlambat</a></li>
                            <li><a href="#" class="dropdown-item">Tidak Terlambat</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-outline-secondary mr-2">
                        <i class="fa-solid fa-rotate"></i> Reset
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
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tanggal Absen</th>
                                <th scope="col">Jam Absen</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @forelse($absensi as $key => $a)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $a->NIM }}</td>
                                <td>{{ $a->namaMahasiswa }}</td>
                                <td>{{ $a->kelas }}</td>
                                <td>{{ $a->semester }}</td>
                                <td>{{ $a->jenisKelamin }}</td>
                                <td>{{ $a->tgl_absen }}</td>
                                <td>{{ $a->jam_absen }}</td>
                                <td>
                                    @if($a->status == "Terlambat")
                                        <button class="btn btn-danger btn-sm">{{$a->status}}</button>
                                    @elseif($a->status == "Tidak Terlambat")
                                        <button class="btn btn-success btn-sm">{{$a->status}}</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="#">
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </a>
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
