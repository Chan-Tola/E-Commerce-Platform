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
        <a href="/" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200">
            <i class="fas fa-box  text-primary-600  mr-3 text-lg"></i>
            <span class="font-medium">View Products</span>
        </a>
        <a href="/staffs" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200">
            <i class="fa-solid fa-user text-primary-600  mr-3 text-lg"></i>
            <span class="font-medium">View Staffs</span>
        </a>

        <a href="/users" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all duration-200">
            <i class="fa-solid fa-users text-primary-600 mr-3 text-lg"></i>
            <span class="font-medium">View Users</span>
        </a>

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
                    <p class="font-medium text-gray-800">Admin User</p>
                    <p class="text-xs text-primary-600">Administrator</p>
                </div>
            </div>
            <button class="text-primary-600 hover:text-gray-700">
                <i class="fas fa-ellipsis-v"></i>
            </button>
        </div>
    </div>
</aside>
