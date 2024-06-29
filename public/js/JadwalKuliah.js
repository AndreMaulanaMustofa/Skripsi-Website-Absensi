function deleteJadwal(id){
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
                type: "POST",
                url: "/Mahasiswa/deleteData/" + id,
                data: {
                    _token: csrfToken,
                    _method: "DELETE",
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

function validasiJadwal(){
    const formJadwal = document.getElementById('FormJadwal');
    const matkulSelect = document.getElementById('matkul');
    const hariSelect = document.getElementById('hari');

    if (hariSelect.value === "-- Pilih Hari --" || matkulSelect.value === "-- Pilih Mata Kuliah --" || !formJadwal.checkValidity()) {
        // Cek jika mata kuliah belum dipilih
        if (matkulSelect.value === "-- Pilih Mata Kuliah --") {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Tolong pilih mata kuliah!",
                showConfirmButton: false,
                timer: 1500,
            });
        } else {
            // Validasi form secara umum
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Lengkapi data terlebih dahulu!",
                showConfirmButton: false,
                timer: 1500,
            });
        }
        return false;
    }else{
        formJadwal.submit();

        Swal.fire({
            position: "center",
            icon: "success",
            title: "Data telah disimpan!",
            showConfirmButton: false,
            timer: 1500,
        });
    }
}

function deleteJadwal(id){
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
                type: "POST",
                url: "/JadwalKuliah/deleteJadwal/" + id,
                data: {
                    _token: csrfToken,
                    _method: "DELETE",
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

function buttonUlang(){
    const btncheck1 = document.getElementById('btncheck1');
    const btncheck2 = document.getElementById('btncheck2');

    const pengulangan = document.getElementById('jmlPengulangan');

    if (!btncheck1.checked && !btncheck2.checked) {
        btncheck2.checked = true;
        btncheck2.disabled = true;
        pengulangan.style.display = 'none';
    }

    btncheck1.addEventListener('click', function() {
        if (btncheck1.checked) {
            btncheck2.checked  = false;
            btncheck1.disabled = true;
            btncheck2.disabled = false;

            pengulangan.style.display = 'flex';
        }
    });

    btncheck2.addEventListener('click', function() {
        if (btncheck2.checked) {
            btncheck1.checked  = false;
            btncheck2.disabled = true;
            btncheck1.disabled = false;

            pengulangan.style.display = 'none';
        }
    });
}

