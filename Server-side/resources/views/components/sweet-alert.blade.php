@props([
    'type' => 'success',
    'message' => '',
    'title' => null,
])

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            position: "top-end",
            icon: "{{ $type }}",
            title: "{{ $title ?? ($type === 'success' ? 'Success!' : 'Oops...') }}",
            text: "{{ $message }}",
            timer: 1500,
            width: 350,              // Make it narrower
            showConfirmButton: false,
            showClass: {
                popup: `animate__animated animate__fadeInUp animate__faster`
            },
            hideClass: {
                popup: `animate__animated animate__fadeOutDown animate__faster`
            }
        });
    });
</script>
