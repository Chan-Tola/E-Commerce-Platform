@extends('components.header')
@section('title', 'form Add')

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        {{-- sidebar --}}
        @include('components.sidebar')
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('components.navbar')
            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                <form action="{{ route('product.store') }}"
                    class="max-w-xl mx-auto p-6 bg-white shadow-lg rounded-2xl space-y-4" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-2xl font-bold text-center">Add New Product</h2>
                    <!-- Imgae -->
                    <figure class="flex flex-col items-start space-y-2">
                        <label class="block text-gray-700 font-medium">Profile Picture</label>
                        <!-- Hidden File Input -->
                        <input type="file" name="image" accept="image/*" class="image-input hidden"
                            id="customFileInput" />
                        <!-- Image preview -->
                        <img class="image-preview hidden mt-5 w-48 h-48  object-contain rounded border" />

                        <!-- Custom Upload Button -->
                        <label for="customFileInput"
                            class="cursor-pointer  text-center  p-4 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-full font-semibold text-sm">
                            <i class="fa-solid fa-image"></i>
                        </label>
                        @error('image')
                            <span class="text-red-600">Name is required</span>
                        @enderror
                    </figure>
                    <!-- Name -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Product Name</label>
                        <input type="text" name="name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter product name" />
                        @error('name')
                            <span class="text-red-600">Name is required</span>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Price ($)</label>
                        <input type="number" name="price" step="0.01"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter price" />
                        @error('price')
                            <span class="text-red-600">Price is required</span>
                        @enderror
                    </div>

                    <!-- Quantity -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Quantity</label>
                        <input type="number" name="quantity"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter quantity" />
                        @error('quantity')
                            <span class="text-red-600">Quantiy is required</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Status</label>
                        <select name="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select status</option>
                            <option>popular
                            </option>
                            <option>normal</option>
                        </select>
                        @error('status')
                            <span class="text-red-600">Status is required</span>
                        @enderror
                    </div>

                    <!-- Sell Date -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Sell Date</label>
                        <input type="date" name="sell_date"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('sell_date')
                            <span class="text-red-600">Sell Date is required</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                            Add Product
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>

@if (Session::has('success'))
    <x-sweet-alert type="success" :message="session('success')" />
@endif
@if ($errors->any())
    <x-sweet-alert type= "Oops..." :message="Something went wrong!" />
@endif
{{-- code for show image change --}}
<script src="{{ asset('js/image-preview.js') }}"></script>
