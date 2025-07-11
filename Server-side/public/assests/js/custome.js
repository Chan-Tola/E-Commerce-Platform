$(document).ready(function () {
    console.log("Javascript is working!");
    $(document).on("click", 'button[data-action ="show"]', function () {
        console.log("Button Clicked!");
        console.log("Modal URL:", $(this).data("modal-url"));
        console.log("Title:", $(this).data("title"));
        alert("Hello World!");
    });
});
