<!-- Modern Top Navbar -->
<nav class="bg-white border-gray-900 border-b  z-0">
    <div class="flex justify-between p-4  items-center ">
        <div class="flex items-center">
            <h1 class="text-xl capitalize font-semibold text-gray-800">   {{ Auth::guard('staff')->user()->role }} Dashboard</h1>
        </div>

        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search..."
                    class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>

            <button class="relative p-2 text-gray-600 hover:text-gray-900">
                <i class="fas fa-bell text-lg"></i>
                <span
                    class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
            </button>
        </div>
    </div>
</nav>
