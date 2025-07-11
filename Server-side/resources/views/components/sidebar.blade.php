<!-- Modern Sidebar -->
<aside class="w-64 bg-white shadow-lg z-10 transition-all duration-300 cursor-pointer">
    <div class="p-4 fixed top-0 w-64">
        <div class="flex items-center space-x-3">
            <div
                class="bg-gradient-to-br from-primary-500 to-primary-700 w-10 h-10 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-xl">D</span>
            </div>
            <h1 class="text-xl font-bold text-gray-800">Dashboard</h1>
        </div>
    </div>

    <nav class="p-4 top-14 fixed space-y-1 mt-3">
        <div x-data="{ open: false }" class="relative inline-block text-left">
            <button @click="open = !open" type="button"
                class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer"
                aria-haspopup="true" :aria-expanded="open.toString()">
                <i class="fas fa-box text-primary-600 mr-3 text-lg"></i>
                <span class="font-medium">Products</span>
                <svg class="ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            {{-- drop down --}}
            <div x-show="open" @click.away="open = false" x-transition
                class="mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20"
                style="display: none;">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                    <a href="{{ route('index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        role="menuitem">View Products</a>
                    <a href="{{ route('productdetail.index') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Product
                        Detail</a>
                </div>
            </div>
        </div>



        <button onclick="window.location='{{ route('staffs') }}'"
            class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer w-full text-left">
            <i class="fa-solid fa-user text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">View Staffs</span>
        </button>

        <button onclick="window.location='{{ route('users.index') }}'"
            class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer w-full text-left">
            <i class="fa-solid fa-users text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">View Users</span>
        </button>

        <button onclick="window.location='{{ route('orders') }}'"
            class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer w-full text-left">
            <i class="fa-solid fa-users text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">Order</span>
        </button>


        {{-- <a href="#" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200">
            <i class="fas fa-cog text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">Settings</span>
        </a> --}}
    </nav>
    <div class="fixed bottom-0 w-64 border-t border-gray-900 p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-10 h-10 rounded-full object-cover"
                    alt="Admin">
                <div>
                    {{-- <p class="font-medium text-gray-800">{{ $staffs->full_name }}</p> --}}
                    {{-- <p class="text-xs text-primary-600">{{ $staffs->role }}</p> --}}
                </div>
            </div>
            <button class="text-primary-600 hover:text-gray-700">
                <i class="fas fa-ellipsis-v"></i>
            </button>
        </div>
    </div>
</aside>
<script src="//unpkg.com/alpinejs" defer></script>
