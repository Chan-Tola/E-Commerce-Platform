// note: create a new fn for no refresh page
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    // note:  Global form handler - use class 'ajax-form' on any form
    $(document).on("submit", "#ajax-crub", function (e) {
        e.preventDefault(); //todo: Prevent page refresh

        let form = $(this);
        let url = form.attr("action");
        let method = form.attr("method") || "POST";
        let formData = new FormData(this); //note: Use FormData for file uploads support addintion FormData(this) gets ALL data including files!

        // Debug: Log form details
        console.log("📝 Form details:", {
            url: url,
            method: method,
            hasAction: !!url,
            formId: form.attr("id"),
            formClass: form.attr("class"),
        });

        // todo: Show loading state
        let submitButton = form.find('button[type="submit"]');
        let originalText = submitButton.text() || submitButton.val();

        submitButton.prop("disabled", true).text("Loading...");

        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false, //note: Don't process the files
            contentType: false, //note: set content type to false as jQuery will tell the server its a query string reques
            success: function (response) {
                // note: Handle successful response
                if (response.success || response.status === "success") {
                    // SweetAlert Toast
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                    });
                    Toast.fire({
                        icon: response.type ?? "success", // Laravel JSON: { type: 'success', message: '...' }
                        text: response.message ?? "Operation successful!",
                    });
                    // Reset form after successful submission
                    if (response.reset_form !== false) {
                        resetImagePreview("#ajax-crub");
                        $("#ajax-crub")[0].reset();
                    }

                    // Reload table after edit or add
                    $("#staff-table").load(location.href + " #staff-table > *");
                }
            },
            error: function (xhr) {
                // Enable button again
                submitButton.prop("disabled", false).text(originalText);

                if (xhr.status === 422) {
                    // Laravel validation errors
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = [];
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessages.push(errors[key].join(", "));
                        }
                    }
                    Swal.fire({
                        icon: "error",
                        title: "Validation Error",
                        html: errorMessages.join("<br>"),
                    });
                } else {
                    // Other errors
                    Swal.fire({
                        icon: "error",
                        title: "Oops!",
                        text:
                            xhr.responseJSON?.message ??
                            "Something went wrong!",
                    });
                }
            },
            complete: function () {
                // Reset button in case of success or failure
                submitButton.prop("disabled", false).text(originalText);
            },
        });
    });

    $(document).on("submit", "#ajax-delete", function (e) {
        e.preventDefault();
        let url = $(this).attr("action");
        $.ajax({
            url: url,
            type: "POST", // Use POST but send DELETE via _method
            data: $(this).serialize(),
            success: function (response) {
                // SweetAlert Toast
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });
                Toast.fire({
                    icon: response.type ?? "success", // Laravel JSON: { type: 'success', message: '...' }
                    text: response.message ?? "Operation successful!",
                });
                // Reload table after edit or add
                $("#staff-table").load(location.href + " #staff-table > *");
            },
        });
    });
});
