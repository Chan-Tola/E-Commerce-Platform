<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- ✅ jQuery 3.7.1: Used for DOM manipulation, AJAX, and event handling -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('login-script')
    <!-- ✅ Font Awesome 6.4.0: Provides a wide range of icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- ✅ SweetAlert2 v11: Beautiful, responsive alert and modal popups -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- ✅ Alpine.js 3.x: Lightweight JavaScript framework for simple interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>


    <!-- ✅ Tailwind CSS (via Vite): Utility-first CSS framework for fast UI styling -->
    @vite('resources/css/app.css')
    @push('header-script')
        <!-- ✅ Tailwind custom color configuration -->
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                50: '#f0f9ff',
                                100: '#e0f2fe',
                                200: '#bae6fd',
                                300: '#7dd3fc',
                                400: '#38bdf8',
                                500: '#0ea5e9',
                                600: '#0284c7',
                                700: '#0369a1',
                                800: '#075985',
                                900: '#0c4a6e',
                            }
                        }
                    }
                }
            }
        </script>
    @endpush

    <style>
        /* ✅ Google Font (Inter): Clean, modern typography */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        /* ✅ Base body styles */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }

        /* ✅ Sidebar link active and hover effects */
        .sidebar-link.active {
            background-color: #e0f2fe;
            color: #0ea5e9;
            border-left: 4px solid #0ea5e9;
        }

        .sidebar-link:hover:not(.active) {
            background-color: #f0f9ff;
        }

        /* ✅ Card and row hover effects */
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .product-row:hover {
            background-color: #f8fafc;
        }
    </style>
</head>
