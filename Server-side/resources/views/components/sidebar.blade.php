<!-- Modern Sidebar -->

<aside class="w-64 bg-white border-r border-gray-900 shadow-lg z-10 transition-all duration-300 cursor-pointer">
    <main class="fixed top-0 p-4 w-64">
        <div class="flex items-center space-x-3">
            <div
                class="bg-gradient-to-br from-primary-500 to-primary-700 w-10 h-10 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-xl"></span>
            </div>
            <h1 class="text-xl font-bold text-gray-800"><a href="{{ route('index') }}">Dashboard</a></h1>
        </div>
    </main>

    <nav class="fixed top-16 p-4 w-64  border-t  border-gray-900  space-y-1 mt-3">
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
            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-400"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                class="mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20"
                style="display: none;">
                {{-- menu / route --}}
                <a href="{{ route('index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    role="menuitem">View Products</a>

                {{-- menu product Detail route --}}
                <a href="{{ route('productdetail.index') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Product
                    Detail</a>
            </div>
        </div>

        {{-- link to staffs route --}}
        <a href='{{ route('staff') }}'"
            class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer w-full text-left">
            <i class="fa-solid fa-user text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">View Staffs</span>
        </a>

        {{-- link to users route --}}
        <a href='{{ route('users.index') }}'"
            class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer w-full text-left">
            <i class="fa-solid fa-users text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">View Users</span>
        </a>

        {{-- link to order route --}}
        <a href='{{ route('orders') }}'"
            class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 cursor-pointer w-full text-left">
            <i class="fa-solid fa-users text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">Order</span>
        </a>

        {{-- any feature in future --}}
        {{-- <a href="#" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200"> --}}
        {{-- <i class="fas fa-cog text-primary-600 mr-3 text-lg"></i> --}}
        {{-- <span class="font-medium">Settings</span> --}}
        {{-- </a> --}}

    </nav>

    <section x-data="{ open: false }" @click="open = !open" class="fixed bottom-0 w-64   border-t border-gray-900 p-4">
        <div class="flex items-center justify-between relative">
            {{-- Profile Pic --}}
            <div class="flex items-center space-x-3">
                <img src="{{ asset(Auth::guard('staff')->user()->profile_picture) }}"
                    class="w-10 h-10 rounded-full object-cover" alt="staff profile picture">
                {{-- name staff --}}
                <span>
                    {{ fullName(Auth::guard('staff')->user()) }}
                </span>
            </div>

            <!-- Icon to toggle -->
            <div class="relative ">
                <button class="text-primary-600 hover:text-gray-700 focus:outline-none">
                    <i class="fas fa-cog text-primary-600 mr-3 text-lg"></i>
                </button>
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-2"
                    class="absolute bottom-14 -right-2 w-60 bg-[#FFFFFF] border divide-y divide-gray-100 rounded-lg shadow-lg z-20"
                    style="display: none;">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            class="gap-2 w-full justify-start items-center flex px-4 py-2 hover:bg-gray-200 hover:text-black dark:hover:bg-gray-700 dark:hover:text-white"
                            type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</aside>
