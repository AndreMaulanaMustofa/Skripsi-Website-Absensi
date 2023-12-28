@extends('layouts.view')

@section('container-absensi')

<div class="content-wrapper" style="background-color: white">
    <div class="content-header p-4">
        <div class="container-fluid px-4">
            <h3>Tambah Data Mahasiswa</h3>
            <hr style="border-width: 2px; background-color: #B4B8C5">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>NIM<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <input type="tel" pattern="[0-9]+"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            class="form-control" name="NIM" id="NIM" value="{{ $mahasiswa->NIM }}">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Nama Lengkap<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{ $mahasiswa->namaLengkap }}">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Kelas<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-sm-1">
                        <select name="kelas" id="kelas" class="form-control">
                            @foreach ($kelas as $item)
                                <option value="{{ $item->kelas }}" {{ $item->kelas == $mahasiswa->Kelas ? 'selected' : '' }}>{{ $item->kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-1 d-flex align-items-center">
                    <div class="col-md-4">
                        <p>Jenis Kelamin<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-4 d-flex align-items-center column-gap-3">
                        <input {{ $mahasiswa->jenisKelamin == "Laki-Laki" ? 'checked' : '' }} type="radio" name="jenisKelamin" value="Laki-Laki"> Laki-Laki
                        <input {{ $mahasiswa->jenisKelamin == "Perempuan" ? 'checked' : '' }} type="radio" name="jenisKelamin" value="Perempuan"> Perempuan
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Nomor Telepon<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <input type="tel" pattern="[0-9]+"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            class="form-control" name="NomorTelp" id="NomorTelp" value="{{ $mahasiswa->NoTelp }}">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Tahun Masuk<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-1">
                        <select name="tahunMasuk" class="form-control">
                            <option value="" style="display: none;">YYYY</option>
                            <?php
                                for ($tahun = 2020; $tahun <= 2024; $tahun++) {
                                    echo "<option value='$tahun' >$tahun</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <h3>Tambah Data Orang Tua</h3>
                <hr style="border-width: 2px; background-color: #B4B8C5">
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Nama Ayah<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="namaAyah" class="form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Nomor Telepon Ayah<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <input type="tel" pattern="[0-9]+"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            class="form-control" name="NomorAyah" id="NomorAyah">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Nama Ibu<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="namaIbu" class="form-control">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Nomor telpon Ibu<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <input type="tel" pattern="[0-9]+"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            class="form-control" name="NomorIbu" id="NomorIbu">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-4">
                        <p>Domisili<span class="star-wajib">*</span></p>
                    </div>
                    <div class="col-md-8">
                        <select name="provinsiIndo" class="form-control" id="provinsi"></select>
                    </div>
                </div>
                <div class="col-mt-6 d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('mahasiswa.view') }}'">Kembali</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>APIKota();</script>
@endsection
