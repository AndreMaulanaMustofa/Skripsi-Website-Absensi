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

function validasiKelas(){
    const formKelas = document.getElementById('FormKelas');

    if(!formKelas.checkValidity()){
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Lengkapi data terlebih dahulu!",
            showConfirmButton: false,
            timer: 1500,
        });
        return false;
    }else{
        formKelas.submit();

        Swal.fire({
            position: "center",
            icon: "success",
            title: "Data telah disimpan!",
            showConfirmButton: false,
            timer: 1500,
        });
    }
}
