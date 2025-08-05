<!-- Modern Sidebar -->
<aside class="w-64 bg-white border-r border-gray-900 shadow-lg z-10 transition-all duration-300 cursor-pointer">
    <main class="fixed top-0 p-4 w-64">
        <div class="flex items-center space-x-3">
            <div
                class="bg-gradient-to-br from-primary-500 to-primary-700 w-10 h-10 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-xl"></span>
            </div>
            <h1 class="text-xl font-bold text-gray-800">Dashboard</h1>
        </div>
    </main>

    <nav class="p-4 w-64  border-t top-16 border-gray-900 fixed space-y-1 mt-3">
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

                    {{-- menu / route --}}
                    <a href="{{ route('index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        role="menuitem">View Products</a>

                    {{-- menu product Detail route --}}
                    <a href="{{ route('productdetail.index') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Product
                        Detail</a>
                </div>
            </div>
        </div>

        {{--link to staffs route--}}
        <button onclick="window.location='{{ route('staffs') }}'"
            class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer w-full text-left">
            <i class="fa-solid fa-user text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">View Staffs</span>
        </button>

        {{--link to users route--}}
        <button onclick="window.location='{{ route('users.index') }}'"
            class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer w-full text-left">
            <i class="fa-solid fa-users text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">View Users</span>
        </button>

        {{--link to order route--}}
        <button onclick="window.location='{{ route('orders') }}'"
            class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer w-full text-left">
            <i class="fa-solid fa-users text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">Order</span>
        </button>

        {{--any feature in future--}}
        {{--<a href="#" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200">--}}
        {{--<i class="fas fa-cog text-primary-600 mr-3 text-lg"></i>--}}
        {{--<span class="font-medium">Settings</span>--}}
        {{--</a>--}}

    </nav>

    <section id="settingIcon" class="fixed bottom-0 w-64 border-t border-gray-900 p-4">
        <div  class="flex items-center justify-between">
            {{-- Profile Pic --}}
            <div class="flex items-center space-x-3">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-10 h-10 rounded-full object-cover"
                    alt="Admin">
                {{-- name staff --}}
                <span>
                    {{ fullName(Auth::guard('staff')->user())  }}
                </span>
            </div>

            <!-- Icon to toggle -->
            <button id="toggleLogout" type="button" class="text-primary-600 hover:text-gray-700">
                <i class="fas fa-cog text-primary-600 mr-3 text-lg"></i>
            </button>

            <!-- button logout with Icon to Toggle -->
            <section id="buttonLogout"  class="hidden absolute z-10 left-1 -top-16 w-60 overflow-auto rounded-lg border border-slate-200 bg-white p-1.5  shadow-sm focus:outline-none">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="cursor-pointer text-slate-800 flex gap-2 w-full text-sm items-center rounded-md p-3 transition-all uppercase hover:bg-red-600 hover:text-white font-bold focus:bg-slate-100 active:bg-slate-100" type="submit">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </button>
                </form>
            </section>
        </div>
    </section>
</aside>
<script src="{{ asset('js/sidebar.js') }}" ></script>
<script src="//unpkg.com/alpinejs" defer></script>
