import Swal from "sweetalert2";

document.addEventListener("DOMContentLoaded", () => {
    const imageInput = document.getElementById("image");
    const preview = document.getElementById("image-preview");
    const container = document.getElementById("image-preview-container");
    const uploadPlaceholder = document.getElementById("upload-placeholder");
    const removeBtn = document.getElementById("remove-image-btn");
    const removeOverlay = document.getElementById("remove-overlay");
    const removeInput = document.getElementById("remove_image");
    const uploadLabelReplace = document.getElementById("upload-label-replace");
    const uploadLabelNew = document.getElementById("upload-label-new");
    const uploadSection = document.getElementById("upload-section");
    const currentImageContainer = document.getElementById(
        "current-image-container"
    );

    let isRemoved = false;

    if (imageInput) {
        imageInput.addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (!file) return;

            if (file.size > 2 * 1024 * 1024) {
                Swal.fire({
                    icon: "error",
                    title: "Ukuran gambar terlalu besar!",
                    text: "Ukuran gambar tidak boleh lebih dari 2 MB.",
                });
                e.target.value = "";
                return;
            }

            const reader = new FileReader();
            reader.onload = (ev) => {
                preview.src = ev.target.result;
                container.classList.remove("hidden");
                uploadPlaceholder.classList.add("hidden");

                if (removeOverlay) removeOverlay.classList.add("hidden");
                if (removeInput) removeInput.value = 0;
                isRemoved = false;

                if (uploadLabelReplace && uploadLabelNew) {
                    uploadLabelReplace.classList.remove("hidden");
                    uploadLabelNew.classList.add("hidden");
                }
            };
            reader.readAsDataURL(file);
        });
    }

    if (removeBtn) {
        removeBtn.addEventListener("click", async () => {
            const confirm = await Swal.fire({
                title: "Hapus gambar ini?",
                text: "Gambar lama akan dihapus dan tidak tersimpan jika kamu tidak mengupload gambar baru.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal",
                confirmButtonColor: "#ef4444",
                cancelButtonColor: "#6b7280",
            });

            if (confirm.isConfirmed) {
                isRemoved = true;
                console.log("Hapus gambar dikonfirmasi!");
                if (removeInput) removeInput.value = 1;
                console.log("Set removeInput", removeInput.value);

                if (currentImageContainer) {
                    currentImageContainer.style.display = "none";
                }

                if (removeOverlay) removeOverlay.classList.add("hidden");

                if (uploadSection) {
                    uploadSection.classList.remove("hidden");
                    uploadSection.scrollIntoView({ behavior: "smooth" });
                }

                if (imageInput) imageInput.value = "";

                await Swal.fire({
                    icon: "success",
                    title: "Gambar dihapus",
                    text: "Gambar lama telah dihapus. Silakan upload gambar baru jika diperlukan.",
                    timer: 1500,
                    showConfirmButton: false,
                });
            }
        });
    }
});
