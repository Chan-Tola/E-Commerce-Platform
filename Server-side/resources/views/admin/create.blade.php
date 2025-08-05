@extends('components.header')
@section('title', 'Register')
<body class="bg-gray-50">
<div class="flex min-h-screen">
    @include('components.sidebar')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        @include('components.navbar')
        <!-- Content Area -->
        <main class="flex-1 overflow-y-auto p-6">
            <form action="{{ route('staff.store') }}"
                  class="max-w-xl mx-auto p-6 bg-white shadow-lg rounded-2xl space-y-4" method="POST"
                  enctype="multipart/form-data">
                @csrf
                {{-- @csrf this is using for token --}}

                <h2 class="text-2xl font-bold text-center">Register</h2>

                <!-- Photo -->
                <figure class="flex flex-col items-start space-y-2">
                    <label class="block text-gray-700 font-medium">Profile Picture</label>
                    <!-- Hidden File Input -->
                    <input type="file" name="profile" accept="image/*" class="image-input hidden"
                           id="customFileInput" />

                    <!-- Image preview -->
                    <img class="image-preview hidden mt-5 w-48 h-48  object-contain rounded border" />
                    <!-- Custom Upload Button -->

                    <label for="customFileInput"
                           class="cursor-pointer  text-center  p-4 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-full font-semibold text-sm">
                        <i class="fa-solid fa-image"></i>
                    </label>
                </figure>

                <!-- full name -->
                <section class="flex items-center justify-between">
                <!-- first name -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">First Name</label>
                    <input type="text" name="firstName"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="first name" />
                    @error('firstName')
                    <span class="text-red-600">first name is required</span>
                    @enderror
                </div>
                <!-- last name -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Last Name</label>
                    <input type="text" name="lastName"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="last name" />
                    @error('lastName')
                    <span class="text-red-600">first name is required</span>
                    @enderror
                </div>
                </section>

                <!-- Gender -->
                <section class="flex justify-between items-center">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Gender</label>
                        <div class="flex px-2 py-2 items-center gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="M"
                                       class="form-radio text-blue-500 focus:ring-blue-500">
                                <span class="ml-2">Male</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="F"
                                       class="form-radio text-blue-500 focus:ring-blue-500">
                                <span class="ml-2">Female</span>
                            </label>
                        </div>
                        @error('gender')
                        <span class="text-red-600">Gender is required</span>
                        @enderror
                    </div>
                    <!-- Date of birth -->
                    <div class="w-3/5">
                        <label class="block text-gray-700 font-medium mb-1">Date of birth</label>
                        <input type="date" name="DOB"
                               class="w-full px-2 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                </section>

                <!-- email -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email Address</label>
                    <input type="email" name="email"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="email address" />
                    @error('email')
                    <span class="text-red-600">email address is required</span>
                    @enderror
                </div>
                <!-- password -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Password</label>
                    <input type="text" name="password"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="password" />
                    @error('password')
                    <span class="text-red-600">password is required</span>
                    @enderror
                </div>

                <!-- role -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Role</label>
                    <select name="role" disabled
                            class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="staff" selected>Staff</option>
                    </select>
                    <input type="hidden" name="role" value="staff">
                </div>



                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                       Regiester
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.image-input').forEach(input => {
            input.addEventListener('change', event => {
                const file = event.target.files[0];
                if (file) {
                    // Show file name
                    const fileNameElement = input.closest('div').querySelector('.file-name');
                    if (fileNameElement) {
                        fileNameElement.textContent = "Selected file: " + file.name;
                        fileNameElement.classList.remove('hidden');
                    }

                    // Show image preview
                    const reader = new FileReader();
                    reader.onload = e => {
                        const preview = input.closest('div').querySelector(
                            '.image-preview');
                        if (preview) {
                            preview.src = e.target.result;
                            preview.classList.remove('hidden');
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    });
</script>
