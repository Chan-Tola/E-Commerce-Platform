$(document).ready(function (){
    $(document).on("click",'#settingIcon',function (e){
        $('#buttonLogout').toggleClass('hidden');
        e.stopPropagation(); // prevent the click from reaching the document
    })
    // Hide when clicking outside
    $(document).on("click", function (e) {
        // Check if the click was outside both #settingIcon and #buttonLogout
        if (!$(e.target).closest('#settingIcon, #buttonLogout').length) {
            $('#buttonLogout').addClass('hidden');
        }
    });
})

