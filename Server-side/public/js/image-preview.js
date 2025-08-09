// displays it in the preview image element.
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".image-input").forEach((input) => {
        input.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                // Show file name
                const fileNameElement = input
                    .closest("div")
                    .querySelector(".file-name");
                if (fileNameElement) {
                    fileNameElement.textContent = "Selected file: " + file.name;
                    fileNameElement.classList.remove("hidden");
                }

                // Show image preview
                const reader = new FileReader();
                reader.onload = (e) => {
                    const preview = input
                        .closest("div")
                        .querySelector(".image-preview");
                    if (preview) {
                        preview.src = e.target.result;
                        preview.classList.remove("hidden");
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    });
});
function handleImageChange(event) {
    const file = event.target.files[0];
    const previewImag = document.getElementById("thumbnailPreview");
    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImag.src = e.target.result;
            previewImag.classList.remove("hidden");
        };

        reader.readAsDataURL(file);
    }
}
