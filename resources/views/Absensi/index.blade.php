@extends('layouts.view')

@section('container-absensi')
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
                                <th scope="col">Hari</th>
                                <th scope="col">Mata Kuliah</th>
                                <th scope="col">Jam Mulai</th>
                                <th scope="col">Jam Akhir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($jadwal as $key => $j)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $j->kelas }}</td>
                                <td>{{ $j->jurusan }}</td>
                                <td>{{ $j->semester }}</td>
                                <td>{{ $j->hari }}</td>
                                <td>{{ $j->matkul }}</td>
                                <td>{{ date('H:s', strtotime($j->jam_mulai)) }}</td>
                                <td>{{ date('H:s', strtotime($j->jam_akhir)) }}</td>
                                <td>
                                    <a href="{{ route('kelas.edit', $j->id) }}">
                                        <button class="btn btn-success btn-sm">Edit</button>
                                    </a>
                                    <button onclick="deleteJadwal('{{ $j->id }}')" class="btn btn-danger btn-sm">Delete</button>
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
