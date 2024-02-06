@extends('layouts.view')

@section('container-absensi')
<div class="content-wrapper" style="background-color: white; margin-top: 120px;">
    <div class="content-header layout">
        <div class="container-fluid">
            {{-- <form action="#" method="POST">
                @csrf --}}
                <div class="container mt-5" style="background-color: white; width: 60%; height: 100%;">
                    <br>

                    @error('error')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <div class="message">
                                <span class="text-red-500">{{$message = "Current Password Salah! Silahkan Coba Lagi."}}</span>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror

                    <div class="container border text-center" style="width: 50%; height: 80%; ">
                        <div class="row mt-3">
                            <div class="row mb-2 mt-2">
                                <h3>QR Code Generator</h3>
                            </div>
                        </div>
                        <div class="container border d-flex align-items-center" style="width: 200px; height: 200px">
                            {{-- Hasil Generate QR Code nya disini --}}
                            <div id="qrcode"></div>
                            <img src="{{ asset('img/qrcode.png') }}" width="180px" id="lama">
                        </div>
                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-3">
                                <button style="width: 100%; margin-bottom: 13px; background-color:red; border:none; color:white; height: 40px;" onclick="downloadQRCode()">PNG <i class="fa fa-download"></i></button>
                            </div>
                            <div class="col-3">
                                <button style="width: 100%; margin-bottom: 13px; background-color:#42BB72; border:none; color:white; height: 40px;" onclick="generateQRCode()">Generate <i class="fa fa-qrcode"></i></button>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
@foreach($mhs as $mhss)
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
    function generateQRCode() {
        // Clear the existing content inside the 'qrcode' element
        document.getElementById('qrcode').innerHTML = '';

        // Generate the new QR code
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "{{$mhss->NIM}}", // You can replace this with the actual data you want to encode
            width: 180,
            height: 180,
        });

        // Check if the element with id 'lama' exists before hiding it
        var lamaElement = document.getElementById('lama');
        if (lamaElement) {
            $(lamaElement).hide(); // Using jQuery to hide the element
            // Alternatively, you can use plain JavaScript to hide the element:
            // lamaElement.style.display = 'none';
        }

        // Menambahkan lapisan (div) di atas QR code untuk gambar
        var overlayDiv = document.createElement("div");
        overlayDiv.style.position = "relative";
        overlayDiv.style.width = "100%";
        overlayDiv.style.height = "100%";

        var img = document.createElement("img");
        img.src = "{{ asset('img/polinema_logo.png') }}"; // Gantilah dengan path gambar Anda
        img.style.position = "absolute";
        img.style.top = "50%";
        img.style.left = "50%";
        img.style.transform = "translate(-58%, -320%)";
        img.style.width = "32px";
        overlayDiv.appendChild(img);

        // Menambahkan lapisan ke elemen QR code
        document.getElementById('qrcode').appendChild(overlayDiv);
    }

    function downloadQRCode() {
        // Mengonversi elemen QR code menjadi gambar menggunakan html2canvas
        var qrcode = document.getElementById("qrcode");
        html2canvas(qrcode).then(function(canvas) {
            // Mengubah canvas menjadi data URL
            var imgDataUrl = canvas.toDataURL('image/png');

            // Membuat tautan unduh
            var downloadLink = document.createElement('a');
            downloadLink.href = imgDataUrl;
            downloadLink.download = 'qrcode.png';

            // Menjalankan tautan unduh
            downloadLink.click();
        });
    }
</script>
@endforeach
@endsection
