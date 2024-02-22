@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
    <div class="content-header layout">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <h3 class="mb-3 ">Data Absensi</h3>
                <div class="col-md-9">
                    <button class="btn btn-outline-primary mr-2 date" data-bs-toggle="modal" data-bs-target="#dateModal">
                        <i class="fa-solid fa-calendar"></i> Berdasarkan Tanggal
                    </button>
                    <div class="btn-group">
                        <button class="btn btn-outline-danger mr-2" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 5px">
                            <i class="fa-solid fa-clipboard-check"></i> Berdasarkan Status
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item status">Terlambat</a></li>
                            <li><a href="#" class="dropdown-item status">Tidak Terlambat</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-outline-secondary mr-2 reset">
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

                        <tbody class="text-center absenFilter regular">
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
                                    <button onclick="deleteData('{{ $a->id }}')" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                                @empty
                                <td colspan="7">Data Tidak Ada!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @include('Absensi.dateModal')
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    mencariData();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0-beta/jquery.min.js" integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

        $(document).on('click', '.reset', function(){
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '{{ route('absensi.view') }}', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                window.location.href = '{{ route('absensi.view') }}';
                }else{
                    document.getElementById('segar').innerHTML = xhr.responseText;
                };
            };
            xhr.send();
        });

    $(document).on('click', '.status', function() {
        var status = $(this).html();
        $.ajax({
            url: "DataAbsensi/getAbsensi/" + status,
            method: "GET",
            data: {status: status},
            success: function(data) {
                $('.absenFilter').html(data);
                $('.absenFilter').removeClass('regular').addClass('filtered');
            }
        });
    });

    function deleteData(id){
    Swal.fire({
    title: "Hapus Data",
    text: "Data yang dihapus tidak dapat dikembalikan.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {

                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

                $.ajax({
                    type: "DELETE",
                    url: "DataAbsensi/deleteData/" + id,
                    data: {
                        _token: csrfToken,
                    },
                    success: function() {
                        Swal.fire({
                            title: "Terhapus!",
                            text: "Data telah dihapus.",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.location.reload();
                    },
                });
            }
        });
    }
</script>




@endsection
