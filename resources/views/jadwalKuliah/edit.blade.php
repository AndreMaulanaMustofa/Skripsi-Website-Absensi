@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
    <div class="content-header p-4">
        <div class="container-fluid px-4">
            <h3>Edit Jadwal Kuliah</h3>
            <hr style="border-width: 2px; background-color: #B4B8C5">

            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" id="FormJadwal">
                @csrf
                @method('PUT')
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Jurusan<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-sm-2">
                        <select name="jurusan" class="form-control jurusan" id="jurusan">
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->jur_id }}" {{ $item->jur_id == $jadwal->jurusan ? 'selected' : ''}}>{{ $item->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Kelas<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-2">
                        <select name="kelas" id="kelas" class="form-control kelas">
                            @php
                                $namaKelas = App\Models\Kelas::find($jadwal->kelas);
                            @endphp
                            <option selected style="display: none;" value="{{$namaKelas->id}}">{{$namaKelas->kelas}}</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Semester<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-sm-1">
                        <input type="number" min="1" max="8" class="form-control semester" name="semester" value="{{$jadwal->semester}}" id="semester" placeholder="semester">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Hari<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-2">
                        <select name="hari" id="hari" class="form-control">
                            <option value="Senin" {{ $jadwal->hari == "Senin" ? 'selected' : ''}}>Senin</option>
                            <option value="Selasa" {{ $jadwal->hari == "Selasa" ? 'selected' : ''}}>Selasa</option>
                            <option value="Rabu" {{ $jadwal->hari == "Rabu" ? 'selected' : ''}}>Rabu</option>
                            <option value="Kamis" {{ $jadwal->hari == "Kamis" ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ $jadwal->hari == "Jumat" ? 'selected' : '' }}>Jumat</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Mata Kuliah<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-3">
                        <select name="matkul" id="matkul" class="form-control matkul">
                            <option selected style="display: none;" value="{{$jadwal->matkul}}">{{$jadwal->matkul}}</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Jam Mulai<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="jam_mulai" id="matkul_1" value="{{$jadwal->jam_mulai}}">
                    </div>
                </div>
                <script>
                    const jamMulai = document.getElementById('matkul_1');

                    flatpickr(jamMulai, {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        time_24hr: true
                    });
                </script>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Jam Akhir<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="jam_akhir" id="matkul_2" value="{{$jadwal->jam_akhir}}">
                    </div>
                </div>
                <script>
                    const jamAkhir = document.getElementById('matkul_2');

                    flatpickr(jamAkhir, {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        time_24hr: true
                    });
                </script>
                <div class="col-mt-6 d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('jadwal.view') }}'">Kembali</button>
                    <button type="button" onclick="validasiJadwal()" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var jurusan = $(".jurusan").val();
    var kelas = $(".kelas").val();
    var semester = $(".semester").val();

    $(".jurusan").change(function(){
        var selectedJurusan = $(this).val(); // Ambil nilai yang dipilih oleh pengguna

        $.ajax({
            url: 'getKelas/' + selectedJurusan,
            type: 'GET',
            success: function(data){
                $(".kelas").empty();
                $(".kelas").append('<option selected class="d-none">-- Pilih Kelas -- </option>');

                $.each(data, function(id, kelas) {
                    $(".kelas").append('<option value="' + id + '" data-kelas="' + kelas + '">' + kelas + '</option>');
                });
            }
        });
    });

    $(".kelas").change(function(){
        var selectedKelas = $(this).find("option:selected").data("kelas");

        $.ajax({
            url: 'getMatkul/' + selectedKelas + '/' + $(".semester").val(),
            type: 'GET',
            success: function(data){
                $(".matkul").empty();
                $(".matkul").append('<option selected class="d-none"> -- Pilih Mata Kuliah -- </option>');

                if(data) {
                    for(var i = 1; i <= 8; i++) {
                        var matkul = data['matkul_' + i];
                        if(matkul) {
                            $(".matkul").append('<option value ="' + matkul + '">' + matkul + '</option>');
                        }
                    }
                } else {
                    $(".matkul").append('<option value = "" class="d-none" selected> Matkul tidak ditemukan </option>')
                }
            }
        });
    });

    $(".semester").change(function(){
        var selectedKelas = $(".kelas").find("option:selected").data("kelas");
        var selectedSemester = $(this).val();

        $.ajax({
            url: 'getMatkul/' + selectedKelas + '/' + selectedSemester,
            type: 'GET',
            success: function(data){
                $(".matkul").empty();
                $(".matkul").append('<option selected class="d-none"> -- Pilih Mata Kuliah -- </option>');

                if(data) {
                    for(var i = 1; i <= 8; i++) {
                        var matkul = data['matkul_' + i];
                        if(matkul) {
                            $(".matkul").append('<option value ="' + matkul + '">' + matkul + '</option>');
                        }
                    }
                } else {
                    $(".matkul").append('<option value = "" class="d-none" selected> Matkul tidak ditemukan </option>')
                }
            }
        });
    });
});
</script>

@endsection
