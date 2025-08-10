$(document).ready(function () {
    console.log("auth-login.js is running!");

    $("form").on("submit", function () {
        // Show the custom loader
        $("#custom-loader").removeClass("hidden");
    });
});
