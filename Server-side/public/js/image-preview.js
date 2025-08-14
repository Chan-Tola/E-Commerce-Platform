// note:This file handles image preview functionality for forms insert
$(document).on("change", ".image-input", function (event) {
    console.log("Image input changed:", event.target.files);
    const file = event.target.files[0];
    if (!file) return;

    const $preview = $(this).closest("figure").find(".image-preview");
    const reader = new FileReader();

    reader.onload = function (e) {
        $preview.attr("src", e.target.result).removeClass("hidden");
    };

    reader.readAsDataURL(file);
});
// note: This is function to handle image change event in edit form
$(document).on("change", "#imageInput", function (e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            $("#thumbnailPreview")
                .attr("src", event.target.result)
                .removeClass("hidden"); //note: show image if hidden
        };
        reader.readAsDataURL(file);
    }
});
// note: Function to reset image preview after form reset or AJAX success
function resetImagePreview(formSelector) {
    const form = document.querySelector(formSelector);
    if (!form) return;

    form.querySelectorAll(".image-input").forEach((input) => {
        input.value = ""; //note: reset file input
        const preview = input
            .closest("figure")
            ?.querySelector(".image-preview");
        if (preview) {
            preview.src = "";
            preview.classList.add("hidden");
        }
        const fileNameElement = input
            .closest("figure")
            ?.querySelector(".file-name");
        if (fileNameElement) {
            fileNameElement.textContent = "";
            fileNameElement.classList.add("hidden");
        }
    });
}
