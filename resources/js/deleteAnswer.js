import Swal from "sweetalert2";

document.addEventListener("DOMContentLoaded", () => {

    document.addEventListener("submit", function (event) {
        const form = event.target;


        if (form.id !== "delete-answer") return;

        event.preventDefault();

        Swal.fire({
            title: "Yakin ingin menghapus jawaban ini?",
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
