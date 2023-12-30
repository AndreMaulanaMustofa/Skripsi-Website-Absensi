@extends('layouts.view')

@section('container-absensi')

<div class="content-wrapper" style="background-color: white">
    <div class="content-header p-4">
        <div class="container-fluid px-4">
            <h3>Tambah Jadwal Kuliah</h3>
            <hr style="border-width: 2px; background-color: #B4B8C5">
            <form action="{{ route('kelas.store') }}" method="POST" id="FormKelas">
                @csrf
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Jurusan<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-sm-2">
                        <select name="jurusan" class="form-control" id="jurusan">
                            <option selected style="display: none;">-- Pilih Jurusan --</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->jurusan }}">{{ $item->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Kelas<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-2">
                        <select name="kelas" id="kelas" class="form-control">
                            <option selected style="display: none;">-- Pilih Kelas --</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->kelas }}">{{ $item->kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Semester<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-sm-1">
                        <input type="number" class="form-control" name="semester" id="semester" required placeholder="semester">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Hari<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-2">
                        <select name="hari" id="hari" class="form-control">
                            <option selected style="display: none;">-- Pilih Hari --</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Mata Kuliah<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-3">
                        <select name="matkul" id="matkul" class="form-control">
                            <option selected style="display: none;">-- Pilih Mata Kuliah --</option>
                            @foreach ($kelas as $item)
                                @for ($i = 1; $i < 9; $i++)
                                    @php
                                        $matkul = 'matkul_' . $i;
                                    @endphp
                                    <option value="{{ $item->$matkul }}">{{ $item->$matkul }}</option>
                                @endfor
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Jam Mulai<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="matkul_1" id="matkul_1">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Jam Akhir<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="matkul_1" id="matkul_1">
                    </div>
                </div>
                <div class="col-mt-6 d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('mahasiswa.view') }}'">Kembali</button>
                    <button type="button" onclick="validasiKelas()" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $('#kelas option').hide();

        $('#jurusan').change(function () {
            var selectedJurusan = $(this).val();

            $('#kelas option').hide();

            if (selectedJurusan == "Teknologi Informasi") {
                $('#kelas option[value^="TI"]').show();
            }

            if(selectedJurusan == "Teknik Mesin"){
                $('#kelas option[value^="TM"]').show();
            }

            if(selectedJurusan == "Sistem Informasi"){
                $('#kelas option[value^="SI"]').show();
            }

            if(selectedJurusan == "Teknik Listrik"){
                $('#kelas option[value^="TL"]').show();
            }
        });
    });
</script>
@endsection
