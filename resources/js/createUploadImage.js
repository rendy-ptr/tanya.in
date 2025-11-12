import Swal from "sweetalert2";

const imageInput = document.getElementById("image");
if (imageInput) {
    imageInput.addEventListener("change", (e) => {
        const file = e.target.files[0];
        const preview = document.getElementById("image-preview");
        const container = document.getElementById("image-preview-container");

        container.classList.add("hidden");
        preview.src = "";

        if (!file) return;

        if (file.size > 2 * 1024 * 1024) {
            Swal.fire({
                icon: "error",
                title: "Ukuran gambar terlalu besar!",
                text: "Ukuran gambar tidak boleh lebih dari 2 MB. Silakan pilih gambar yang lebih kecil. Atau gambar tidak tersimpan.",
            });
            e.target.value = "";
            return;
        }

        const reader = new FileReader();
        reader.onload = (ev) => {
            preview.src = ev.target.result;
            container.classList.remove("hidden");
        };
        reader.readAsDataURL(file);
    });
}
