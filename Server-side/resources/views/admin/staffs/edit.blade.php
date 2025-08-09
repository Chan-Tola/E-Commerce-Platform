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
                <form action="{{ route('staff.update', $staff->id) }}"
                    class="max-w-xl mx-auto p-6 bg-white shadow-lg rounded-2xl space-y-4" enctype="multipart/form-data">
                    {{-- The form submits to the staff.store route (usually handled by a controller to register staff) --}}
                    @csrf {{-- Adds a CSRF token for security (required for all POST forms in Laravel) --}}
                    @method('PUT')
                    <h2 class="text-2xl font-bold text-center">Edit Form</h2>

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
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="emailAdress" id="emailAdress"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="emailAdress"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                            address</label>
                        @error('emailAdress')
                            {{-- Displays a validation error message if the email field is not filled --}}
                            <span class="text-red-600">Email Adress is required</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="password" id="password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute right-2 top-3 text-gray-500">
                            <i class="fa fa-eye"></i>
                        </button>
                        @error('password')
                            {{-- Displays a validation error message if the email field is not filled --}}
                            <span class="text-red-600">Password is required</span>
                        @enderror
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="first_name" id="first_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="first_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                name</label>
                            @error('first_name')
                                {{-- Displays a validation error message if the email field is not filled --}}
                                <span class="text-red-600">first name is required</span>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="" id="last_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="last_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                                name</label>
                            @error('last_name')
                                {{-- Displays a validation error message if the email field is not filled --}}
                                <span class="text-red-600">last name is required</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
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
                                <span class="text-red-600">Gender is required</span> {{-- Displays a validation error message if the gender field is not filled --}}
                            @enderror
                        </div>
                        <!-- Date of birth -->
                        <div class="w-3/5">
                            <label class="block text-gray-700 font-medium mb-1">Date of birth</label>
                            <input type="date" name="DOB"
                                class="w-full px-2 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                </form>
            </main>
        </div>
    </div>
</body>
@if (Session::has('success'))
    <x-sweet-alert type="success" :message="session('success')" /> {{-- Shows a SweetAlert success message if the session has a 'success' key (after successful form submission) --}}
@endif
@if ($errors->any())
    <x-sweet-alert type= "Oops..." :message="Something went wrong!" /> {{-- Shows a SweetAlert error message if there are any validation errors --}}
@endif
<script src="{{ asset('js/image-preview.js') }}"></script>
<script src="{{ asset('js/formInput.js') }}"></script>
