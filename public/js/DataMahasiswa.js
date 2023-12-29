function mencariData() {
    const searchInput = document.getElementById("searchInput");
    const tableRows = document.querySelectorAll(".tbl-container tbody tr");

    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();

        tableRows.forEach((row) => {
            const rowData = row.textContent.toLowerCase();
            if (rowData.includes(searchTerm)) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    });
}

function validasiData() {
    const NIM = document.getElementById("NIM");
    const namaLengkap = document.getElementById("nama_lengkap");
    const kelas = document.getElementById("kelas");
    const jenisKelamin = document.querySelector(
        'input[name="jenisKelamin"]:checked'
    );
    const nomorTelepon = document.getElementById("NomorTelp");
    const tahunMasuk = document.getElementById("tahunMasuk");

    const namaAyah = document.getElementById("namaAyah");
    const nomorAyah = document.getElementById("NomorAyah");
    const namaIbu = document.getElementById("namaIbu");
    const NomorIbu = document.getElementById("NomorIbu");
    const domisili = document.getElementById("provinsi");

    const formTambah = document.getElementById("myForm");

    const jenisKelaminValid = jenisKelamin ? true : false;
    const domisiliKosong = domisili.value == "";
    const domisiliPilihKota = domisili.value == "-- Pilih Kota --";

    if (
        !NIM.checkValidity() ||
        !namaLengkap.checkValidity() ||
        kelas.value == "" ||
        !jenisKelaminValid ||
        !nomorTelepon.checkValidity() ||
        tahunMasuk.value == "" ||
        !namaAyah.checkValidity() ||
        !namaIbu.checkValidity() ||
        !NomorIbu.checkValidity() ||
        !nomorAyah.checkValidity() ||
        domisiliKosong ||
        domisiliPilihKota
    ) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Lengkapi data terlebih dahulu!",
            showConfirmButton: false,
            timer: 1500,
        });
        return false;
    } else {
        formTambah.submit();

        Swal.fire({
            position: "center",
            icon: "success",
            title: "Data telah disimpan!",
            showConfirmButton: false,
            timer: 1500,
        });
    }
}

function editData(id) {
    Swal.fire({
        title: "Simpan Perubahan?",
        icon: "question",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Ubah",
        denyButtonText: `Batal`
    }).then((result) => {
        if (result.isConfirmed) {
            var myForm = document.getElementById('editForm');

            Swal.fire({
                title: "Perubahan telah disimpan",
                icon: "success",
                showConfirmButton: false,
                timer: 1500
            });
            myForm.submit();

        } else if (result.isDenied) {
            Swal.fire({
                title: "Perubahan telah dibatalkan",
                icon: "error",
                showConfirmButton: false,
                timer: 1500
            });
            window.location.href="/Mahasiswa";
        }
    });
}
