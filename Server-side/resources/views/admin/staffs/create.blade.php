@extends('components.header') {{-- This tells Blade to use the components.header layout as the base for this page --}}
@section('title', 'Register') {{-- Sets the page title to "Register" (used in your layout) --}}

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        {{-- sidebar --}}
        @include('components.sidebar') {{-- Includes the sidebar component for consistent layout --}}
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            @include('components.navbar') {{-- Includes the navbar component for consistent layout --}}
            <!-- Content Area -->
            <main class="flex-1  bg-whiteshadow-sm p-6">
                {{-- for the image I using the Alpine.js --}}
                <form class="max-w-xl mx-auto p-6 bg-white shadow-lg rounded-2xl space-y-4"
                    action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-2xl font-bold text-center">Register</h2>

                    <!-- Photo -->
                    <figure class="flex flex-col items-start space-y-2">
                        <label class="block text-gray-700 font-medium">Profile Picture</label>
                        <input type="file" name="profile_picture" accept="image/*" class="image-input hidden"
                            id="customFileInput" />
                        <img class="image-preview hidden mt-5 w-48 h-48 object-contain rounded border" />
                        <label for="customFileInput"
                            class="cursor-pointer text-center p-4 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-full font-semibold text-sm">
                            <i class="fa-solid fa-image"></i>
                        </label>
                        @error('profile_picture')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </figure>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                                appearance-none dark:text-black dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="first_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                                transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 
                                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                name</label>
                            @error('first_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                                appearance-none dark:text-black dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="last_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                                transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 
                                peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                                name</label>
                            @error('last_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Gender</label>
                            <div class="flex px-2 py-2 items-center gap-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="male"
                                        class="form-radio text-blue-500 focus:ring-blue-500"
                                        {{ old('gender') === 'male' ? 'checked' : '' }}>
                                    <span class="ml-2">Male</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="female"
                                        class="form-radio text-blue-500 focus:ring-blue-500"
                                        {{ old('gender') === 'female' ? 'checked' : '' }}>
                                    <span class="ml-2">Female</span>
                                </label>
                            </div>
                            @error('gender')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-3/5">
                            <label class="block text-gray-700 font-medium mb-1">Date of birth</label>
                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                class="w-full px-2 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            @error('date_of_birth')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                            appearance-none dark:text-black dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                            transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 
                            peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                            address</label>
                        @error('email')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="password" id="password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                            appearance-none dark:text-black dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                            transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 
                            peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute right-2 top-3 text-gray-500">
                            <i class="fa fa-eye"></i>
                        </button>
                        @error('password')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="address" id="address" value="{{ old('address') }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                            appearance-none dark:text-black dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="address"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                            transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 
                            peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address</label>
                        @error('address')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 
                            appearance-none dark:text-black dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="phone"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
                            transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 
                            peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
                            Number</label>
                        @error('phone')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                        font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </form>

            </main>
        </div>
    </div>
</body>
@if (Session::has('success'))
    <x-sweet-alert type="success" :message="session('success')" /> {{-- Shows a SweetAlert success message if the session has a 'success' key (after successful form submission) --}}
@endif
@if ($errors->any())
    <x-sweet-alert type= "error" :message="Something went wrong!" /> {{-- Shows a SweetAlert error message if there are any validation errors --}}
@endif
<script src="{{ asset('js/image-preview.js') }}"></script>
<script src="{{ asset('js/formInput.js') }}"></script>
