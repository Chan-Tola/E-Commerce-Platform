<!doctype html>
<html lang="en">
@include('components.header')
@section('title', 'Dashboard')

<body class="bg-gray-50">
    <div class="flex min-h-screen relative">
        {{-- sidebar --}}
        @include('components.sidebar')
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('components.navbar')
            <!-- Stats Cards -->
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="{{ route('index') }}"><x-status-card title="Total Products" :value="$totalProducts"
                        icon-class="fas fa-box" icon-bg="bg-primary-100" icon-color="text-primary-600" /></a>
                <a href="{{ route('staff') }}">
                    <x-status-card title="Active Staff" :value="$totalStaffs" icon-class="fas fa-users"
                        icon-bg="bg-green-100" icon-color="text-green-600" trend-text="8.2% from last month"
                        trend-color="text-green-500" />
                </a>
                <a href="{{ route('users.index') }}">
                    <x-status-card title="User" :value="$totalUsers" icon-class="fas fa-shopping-cart"
                        icon-bg="bg-amber-100" icon-color="text-amber-600" trend-text="3.2% from last week"
                        trend-color="text-red-500" trend-icon="fas fa-arrow-down" />
                </a>
                <x-status-card title="Order" value="$24,580" icon-class="fas fa-dollar-sign" icon-bg="bg-purple-100"
                    icon-color="text-purple-600" trend-text="18.7% from last month" />
            </div>
            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-6 relative">
                <!-- Product Section -->
                @yield('product')
                @yield('product-details')
                @yield('staffs')
                @yield('users')
                @yield('orders')
            </main>
        </div>
    </div>
    @stack('btnDelete')
</body>

</html>
