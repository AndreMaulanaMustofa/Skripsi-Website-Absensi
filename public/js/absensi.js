function mencariData(){
    const searchInput = document.getElementById("searchInput");
    const tableRows = document.querySelectorAll(".tbl-container tbody tr");

    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();

        tableRows.forEach((row) => {
            const rowData = row.textContent.toLowerCase();
            if (rowData.includes(searchTerm)) {
                row.style.display = "table-row";
            } else {
                row.style.display = 'none';
            }
        });
    });
}

function tambahData(){
    const NIM = document.getElementById('NIM');
    const namaLengkap = document.getElementById('nama_lengkap');
    const kelas = document.getElementById('kelas');
    const jenisKelamin = document.querySelector('input[name="jenisKelamin"]:checked');
    const nomorTelepon = document.getElementById('NomorTelp');
    const tahunMasuk = document.getElementById('tahunMasuk');

    const namaAyah = document.getElementById('namaAyah');
    const nomorAyah = document.getElementById('NomorAyah');
    const namaIbu = document.getElementById('namaIbu');
    const NomorIbu = document.getElementById('NomorIbu');
    const domisili = document.getElementById('provinsi');

    const formTambah = document.getElementById('myForm');

    const jenisKelaminValid = jenisKelamin ? true : false;
    const domisiliValid = domisili.value == "Pilih Kota...";

    if (!NIM.checkValidity() || !namaLengkap.checkValidity() || !kelas.checkValidity() || jenisKelaminValid || !nomorTelepon.checkValidity() || !tahunMasuk.checkValidity() || !namaAyah.checkValidity() || !namaIbu.checkValidity() || !NomorIbu.checkValidity() || !nomorAyah.checkValidity() || !domisiliValid) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Lengkapi data terlebih dahulu!",
            showConfirmButton: false,
            timer: 1500
        });
    } else {
        formTambah.submit();

        Swal.fire({
            position: "center",
            icon: "success",
            title: "Data telah disimpan!",
            showConfirmButton: false,
            timer: 1500
        });
    }
}

function APIKota(){
    fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')
    .then(response => response.json())
    .then(provinces => {
        // Array untuk menyimpan semua data kota dari semua provinsi
        const allRegencies = [];

        // Loop melalui setiap provinsi
        Promise.all(provinces.map(province => {
            // Mengembalikan promise untuk setiap fetch kota
            return fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${province.id}.json`)
                .then(response => response.json())
                .then(regencies => {
                    // Menambahkan data kota dari provinsi tertentu ke dalam array
                    allRegencies.push(...regencies);
                });
        }))
        .then(() => {
            // Setelah semua data kota terkumpul, Anda dapat menggunakannya untuk mengisi elemen <select>
            var provinsiSelect = document.getElementById('provinsi');
            provinsiSelect.innerHTML = '';

            var defaultOption = document.createElement('option');
            defaultOption.style.display = 'none';
            defaultOption.textContent = 'Pilih Kota...';
            provinsiSelect.appendChild(defaultOption);

            allRegencies.forEach(element => {
                var option = document.createElement('option');
                option.dataset.reg = element.id;
                option.value = element.name.toLowerCase().replace(/\b\w/g, l => l.toUpperCase());
                option.textContent = element.name.toLowerCase().replace(/\b\w/g, l => l.toUpperCase());
                provinsiSelect.appendChild(option);
            });
        })
    })
}
