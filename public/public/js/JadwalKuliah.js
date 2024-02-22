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

