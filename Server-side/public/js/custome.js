$(document).ready(function () {
    console.log("Javascript is working!");
    $(document).on("click", 'button[data-action ="show"]', function () {
        console.log("Button Clicked!");
        const url = $(this).data("modal-url");
        const title = $(this).data("title");
        console.log("Modal URL:", url);
        console.log("Title:", title);

        $.ajax({
            url: url,
            success: function (res) {
                console.log("AJAX Success!");
                console.log("Response:", res);
                // Update modal title
                $("#createStatusModalLabel").text(title);

                // Update modal content
                $("#createStatusModal .p-6").html(res);

                // Show modal (Tailwind version)
                showModal();

                console.log(res);
            },
        });
    });
});
