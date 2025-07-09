@extends('components.header')
@section('title', 'Update Form')

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        @include('components.sidebar')
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('components.navbar')
            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                <form action="{{ route('proEdit', $product->id) }}"
                    class="max-w-xl mx-auto p-6 bg-white shadow-lg rounded-2xl space-y-4" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- @csrf this is using for token --}}
                    @method('PUT')
                    <h2 class="text-2xl font-bold text-center">Update Product</h2>

                    <!-- Name -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Product Name</label>
                        <input type="text" name="name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter product name" value="{{ $product->name }}" />
                        @error('name')
                            <span class="text-red-600">Name is required</span>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Price ($)</label>
                        <input type="number" name="price" step="0.01"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter price" value="{{ $product->price }}" />
                        @error('price')
                            <span class="text-red-600">Price is required</span>
                        @enderror
                    </div>

                    <!-- Quantity -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Quantity</label>
                        <input type="number" name="quantity"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter quantity" value="{{ $product->quantity }}" />
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
                            <option value="popular" {{ $product->status == 'popular' ? 'selected' : '' }}>popular
                            </option>
                            <option value="normal" {{ $product->status == 'normal' ? 'selected' : '' }}>normal</option>
                        </select>
                    </div>

                    <!-- Sell Date -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Sell Date</label>
                        <input type="date" name="sell_date"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('sell_date', $product->sell_date ?? '') }}" />
                    </div>

                    <!-- Image Preview Section -->
                    <div class="mt-4 relative" id="previewWrapper">
                        <p class="text-sm text-gray-500">Image Preview</p>
                        <!-- Actual image preview -->
                        <img id="thumbnailPreview" src="{{ asset($product->image ?? '') }}"
                            class="mt-2 w-32 h-32 object-cover rounded border border-gray-300 {{ $product->image ? '' : 'hidden' }}">
                        <!-- Hidden file input -->
                        <input type="file" name="image" id="imageInput" accept="image/*" class="hidden"
                            onchange="handleImageChange(event)">

                        <!-- Change Image Button -->

                        <label onclick="document.getElementById('imageInput').click()"
                            class="cursor-pointer  top-[45%] left-[30%] text-center absolute p-4 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-full font-semibold text-sm">
                            <i class="fa-solid fa-plus"></i>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            Update Product
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>

@if (Session::has('success'))
    <script>
        //Without DOMContentLoaded, your script could run before SweetAlert2 library loads, so Swal would be undefined.
        //Wait for page to load, then show alert. This avoids errors and makes sure your alert always works.
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Success!",
                text: "{{ Session::get('success') }}",
                icon: "success"
            });
        });
    </script>
@endif


@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
            });
        })
    </script>
@endif
<script>
    function handleImageChange(event) {
        const file = event.target.files[0];
        const previewImag = document.getElementById('thumbnailPreview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImag.src = e.target.result;
                previewImag.classList.remove('hidden');
            }

            reader.readAsDataURL(file);
        }

    }
</script>
