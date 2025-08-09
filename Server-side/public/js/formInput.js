$(document).ready(function () {
    console.log("working");
});

function togglePassword(inputId, icon) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
        icon.innerHTML = '<i class="fa fa-eye-slash"></i>';
    } else {
        input.type = "password";
        icon.innerHTML = '<i class="fa fa-eye"></i>';
    }
}
