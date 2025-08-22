@extends('components.header')
@section('title', 'Login Page')
<section class="min-h-screen bg-gray-900 flex items-center justify-center text-white">
    <!-- Note: Place the form code here -->
    <div class="bg-gray-800 p-8 rounded-lg shadow-2xl w-full max-w-md">
        {{-- <div class="flex items-center mb-6">
            <img src="https://flowbite.com/docs/images/logo.svg" alt="Flowbite Logo" class="w-10 h-10 mr-2">
            <h2 class="text-2xl font-bold">Flowbite</h2>
        </div> --}}
        <h3 class="text-xl font-semibold mb-4">Welcome back</h3>
        <p class="mb-6">Start your website in seconds. Don't have an account?
        <form action="{{ route('loginSubmit') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input type="email" name="email" id="email" placeholder="name@company.com"
                    class="mt-1 w-full p-2 bg-gray-700 border border-gray-600 rounded-lg text-[#5F6368] focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    {{-- Displays a validation error message if the email field is not filled --}}
                    <span class="text-red-600">Email is required</span>
                @enderror
            </div>
            <div class="mb-6 relative">
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                    class="mt-1 w-full p-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="button" onclick="togglePassword('password', this)"
                    class="absolute right-1 top-[2.4rem] text-gray-500">
                    <i class="fa fa-eye"></i>
                </button>
                @error('password')
                    {{-- Displays a validation error message if the email field is not filled --}}
                    <span class="text-red-600">Password is required</span>
                @enderror
            </div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="mr-2 accent-blue-500">
                    <label for="remember" class="text-sm text-gray-300">Remember me</label>
                </div>
                <a href="#" class="text-sm text-blue-400 hover:underline">Forgot password?</a>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition">Sign in to your
                account</button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-400">or</p>
            <button
                class="w-full bg-gray-700 text-white p-2 rounded-lg mt-4 flex items-center justify-center hover:bg-gray-600 transition">
                <img src="https://www.google.com/favicon.ico" alt="Google" class="w-5 h-5 mr-2"> Sign in with
                Google
            </button>
            <button
                class="w-full bg-gray-700 text-white p-2 rounded-lg mt-2 flex items-center justify-center hover:bg-gray-600 transition">
                <img src="https://www.apple.com/favicon.ico" alt="Apple" class="w-5 h-5 mr-2"> Sign in with Apple
            </button>
        </div>
    </div>
    <!-- Note: Place the 3D illustration image here -->
    <div class="ml-14 max-h-full hidden lg:block">
        <img src="{{ asset('uploads/Auth/adventure.svg') }}" alt="3D Illustration" class="w-auto h-full">
    </div>
    {{-- C:\Users\ASUS\Desktop\E-Commerce-Platform\Server-side\public\\\ --}}
    <!-- Custom Loading Overlay -->
    <section id="custom-loader"
        class="hidden fixed inset-0 bg-[#212121] bg-opacity-80 z-50 flex items-center justify-center">
        <div class="flex flex-row gap-2">
            <div class="w-[20px] h-[20px] rounded-full bg-white animate-bounce"></div>
            <div class="w-[20px] h-[20px] rounded-full bg-white animate-bounce" style="animation-delay: -0.3s;"></div>
            <div class="w-[20px] h-[20px] rounded-full bg-white animate-bounce" style="animation-delay: -0.5s;"></div>
        </div>
    </section>
    @if (session('sweet-alert'))
        <x-sweet-alert type="error" :message="session('alert-message')" />
    @endif
</section>
@push('login-script')
    <script src="{{ asset('js/auth-login.js') }}"></script>
    <script src="{{ asset('js/formInput.js') }}"></script>
@endpush
{{-- In your Blade file --}}
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
