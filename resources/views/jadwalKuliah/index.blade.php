@extends('layouts.view')

@section('container-absensi')
@php
    use App\Models\jadwal;
@endphp
<div class="content-wrapper" style="background-color: white">
    <div class="content-header layout">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <h3 class="mb-3 ">Jadwal Kuliah</h3>
                <div class="col-md-9">
                    <a href="{{ route('jadwal.create') }}">
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
                                <th scope="col">Kelas</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($jadwal as $key => $j)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $j->n_kelas }}</td>
                                <td>{{ $j->n_jurusan }}</td>
                                <td>{{ $j->smt }}</td>
                                <td>
                                    <a data-bs-toggle="collapse" href="#detailJadwal{{$j->jur_id}}" role="button" aria-expanded="false" aria-controls="detailJadwal{{$j->id}}">
                                        <button class="btn btn-info btn-sm">Detail</button>
                                    </a>
                                </td>
                            </tr>
                            <tr class="collapse fade" id="detailJadwal{{$j->jur_id}}">
                                <td colspan="5">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Hari</th>
                                                <th scope="col">Matkul</th>
                                                <th scope="col">Jam Mulai</th>
                                                <th scope="col">Jam Akhir</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @php
                                                $matkul = jadwal::where('kelas', $j->j_kelas)->where('semester', $j->smt)->get();
                                            @endphp
                                            @foreach($matkul as $key => $mk)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{$mk->hari}}</td>
                                                <td>{{$mk->matkul}}</td>
                                                <td>{{$mk->jam_mulai}}</td>
                                                <td>{{$mk->jam_akhir}}</td>
                                                <td>
                                                    <a href="{{ route('jadwal.edit', $mk->id) }}">
                                                        <button class="btn btn-success btn-sm">Edit</button>
                                                    </a>

                                                    <button onclick="deleteJadwal('{{ $mk->id }}')" class="btn btn-danger btn-sm">
                                                        Delete
                                                    </button>

                                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#KuliahCode{{ $mk->id }}" onclick="generateQRCode(`{{ $mk->matkul }}`, `{{ date('H:i', strtotime($mk->jam_mulai)) }}`)">
                                                        QR Code
                                                    </button>

                                                    <div class="modal animate__animated animate__zoomIn animate__faster" id="KuliahCode{{ $mk->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="KuliahCodeLabel">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">QR Code {{ $mk->matkul }}</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body d-flex justify-content-center">
                                                                    <div id="qrcode"></div>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <div class="col-3">
                                                                        <button style="width: 100%; margin-bottom: 13px; background-color:red; border:none; color:white; height: 40px;" onclick="downloadQRCode()">PNG <i class="fa fa-download"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Data Tidak Ada!</td>
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
