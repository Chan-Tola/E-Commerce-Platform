$(document).ready(function () {
    $(document).ready(function () {
        $(document).on("click", "#btn-deleted", function () {
            let removedId = $(this).data("remove-id");

            if (!removedId) {
                console.error("No ID found for deleted!");
                return;
            }

            $.ajax({
                url: "/product/delete/" + removedId,
                type: "DELETE",
                // please generate this token what is that mean?
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    console.log("Delete:", response);
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
                        icon: "success",
                        title: "Product has been deleted successfully.",
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function (xhr) {
                    console.error("Delete failed:", xhr.responseText);
                },
            });
        });
    });
});
