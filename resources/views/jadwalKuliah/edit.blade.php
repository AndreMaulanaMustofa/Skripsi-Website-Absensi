@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white">
    <div class="content-header p-4">
        <div class="container-fluid px-4">
            <h3>Edit Jadwal Kuliah</h3>
            <hr style="border-width: 2px; background-color: #B4B8C5">

            <form action="{{ url('JadwalKuliah/updateJadwal/' . $jadwal->jadwalid) }}" method="POST" id="FormJadwal">
                @csrf
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Jurusan<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-sm-2">
                        <select name="jurusan" class="form-control jurusan" id="jurusan">
                            <option value="{{$jadwal->jur_id}}" selected style="display: none;">{{$jadwal->n_jurusan}} [Dipilih]</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->jur_id }}">{{ $item->nama_jurusan }}</option>
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
                            <option selected style="display: none;" value="{{$jadwal->kel_id}}">{{$jadwal->n_kelas}}</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Semester<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-sm-1">
                        <input type="number" min="1" max="8" class="form-control" name="semester" value="{{$jadwal->smt}}" id="semester" required placeholder="semester">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Hari<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-2">
                        <select name="hari" id="hari" class="form-control">
                            <option selected style="display: none;" value="{{$jadwal->hari}}">{{$jadwal->hari}} [Terpilih]</option>
                            @if($jadwal->hari == "Senin")
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            @elseif($jadwal->hari == "Selasa")
                            <option value="Senin">Senin</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            @elseif($jadwal->hari == "Rabu")
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            @elseif($jadwal->hari == "Kamis")
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Jumat">Jumat</option>
                            @else<option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            @endif
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
                            {{-- @foreach ($kelas as $item)
                                @for ($i = 1; $i < 9; $i++)
                                    @php
                                        $matkul = 'matkul_' . $i;
                                    @endphp
                                    <option value="{{ $item->$matkul }}">{{ $item->$matkul }}</option>
                                @endfor
                            @endforeach --}}
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(".jurusan").change(function() {
        var selectedOption = $(this).children("option:selected").val();
        console.log(selectedOption);

        // Lakukan permintaan Ajax
        $.ajax({
            url: "{{url('JadwalKuliah/getKelas')}}/" + selectedOption,
            type: 'GET',
            success: function(data) {
                // Hapus opsi lama pada pilihan kedua
                $(".kelas").empty();

                // Tambahkan opsi baru berdasarkan data dari server
                $.each(data, function(id, value) {
                    $(".kelas").append('<option value="" selected style="display:none;">-- Pilih Kelas --</option>');
                    $(".kelas").append('<option value="' + id + '">' + value + '</option>');
                });
            }
        });
    });

    $(".kelas").change(function() {
        var kelas = $(this).children("option:selected").val();

        // Lakukan permintaan Ajax
        $.ajax({
            url: "{{url('JadwalKuliah/getMatkul')}}/" + kelas,
            type: 'GET',
            success: function(data) {
                // Hapus opsi lama pada pilihan ketiga
                $(".matkul").empty();
                $(".matkul").append('<option value="" selected style="display:none;">-- Pilih Mata Kuliah --</option>');

                // Tambahkan opsi baru berdasarkan data dari server
                $(".matkul").append('<option value="' + data.matkul_1 + '">' + data.matkul_1 + '</option>');
                $(".matkul").append('<option value="' + data.matkul_2 + '">' + data.matkul_2 + '</option>');
                $(".matkul").append('<option value="' + data.matkul_3 + '">' + data.matkul_3 + '</option>');
                $(".matkul").append('<option value="' + data.matkul_4 + '">' + data.matkul_4 + '</option>');
                $(".matkul").append('<option value="' + data.matkul_5 + '">' + data.matkul_5 + '</option>');
                $(".matkul").append('<option value="' + data.matkul_6 + '">' + data.matkul_6 + '</option>');
                $(".matkul").append('<option value="' + data.matkul_7 + '">' + data.matkul_7 + '</option>');
                $(".matkul").append('<option value="' + data.matkul_8 + '">' + data.matkul_8 + '</option>');

                // Tambahkan kolom matkul lainnya sesuai kebutuhan
            }
        });
    });
</script>

@endsection
