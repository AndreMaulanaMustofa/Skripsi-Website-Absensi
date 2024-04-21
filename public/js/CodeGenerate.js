function generateQRCode(matkul, jam) {
    // Pastikan data yang akan di-encode tidak kosong
    if (!matkul && !jam) {
        console.error('Data cannot be empty');
        return;
    }

    // Clear the existing content inside the 'qrcode' element
    var qrcodeContainer = document.getElementById('qrcode');
    if (qrcodeContainer) {
        qrcodeContainer.innerHTML = '';

        // Generate the new QR code
        var qrcode = new QRCode(qrcodeContainer, {
            text: matkul + ', ' + jam,
            width: 270,
            height: 270,
        });

        // Menambahkan lapisan (div) di atas QR code untuk gambar
        var overlayDiv = document.createElement('div');
        overlayDiv.style.position = 'block';
        overlayDiv.style.width = '100%';
        overlayDiv.style.height = '100%';

        var img = document.createElement('img');
        img.src = 'img/polinema_logo.png'; // Gantilah dengan path gambar Anda
        img.style.position = 'absolute';
        img.style.top = '50%';
        img.style.left = '50%';
        img.style.transform = 'translate(-50%, -50%)'; // Perbaikan pada bagian transform
        img.style.width = '65px';
        overlayDiv.appendChild(img);

        // Menambahkan lapisan ke elemen QR code
        qrcodeContainer.appendChild(overlayDiv);
    } else {
        console.error('QR Code container not found');
    }
}

// // Panggil fungsi generateQRCode dengan data yang diinginkan
// generateQRCode('2041720211');


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