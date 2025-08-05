$(document).ready(function() {
    console.log("jQuery is loaded and ready!");
    $('form').on('submit', function(e) {
        // Show the custom loader
        $('#custom-loader').removeClass('hidden');
    });
});

