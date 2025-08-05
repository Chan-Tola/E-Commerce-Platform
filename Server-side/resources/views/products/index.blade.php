@extends('layouts.master')
@extends('components.header')
@section('productContent')
    @include('products.components.product-table')
@endsection
@section('title', 'Homepage')

{{-- check logint --}}

@if(session('sweet-alert'))
    <script>
        document.addEventListener('DOMContentLoaded',function (){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title:"{{session('alert-message')}}",
            });

        });
    </script>
@endif
