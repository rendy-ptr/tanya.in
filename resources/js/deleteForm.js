import Swal from "sweetalert2";

const deleteForm = document.getElementById("delete-form");

deleteForm.addEventListener("submit", function (event) {
    event.preventDefault();

    Swal.fire({
        title: "Yakin ingin menghapus pertanyaan ini?",
        text: "Tindakan ini tidak dapat dibatalkan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            deleteForm.submit();
        }
    });
});
