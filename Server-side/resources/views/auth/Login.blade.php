@extends('components.header')
<!-- Load jQuery first -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('title', 'Login Page')
<main class="h-full flex bg-[#e8e8e8] flex-col gap-[5rem] justify-center items-center">
    <section>
        <p class="text-4xl font-bold uppercase text-center  mt-6 mb-4">
            Welcome to Management System
        </p>
    </section>
    <section class="form relative flex flex-col rounded-xl p-3">
        <h4 class="block m-auto uppercase text-3xl font-bold text-slate-800">
            log in
        </h4>

        <form class="mt-2 mb-2 w-80 h-80 max-w-screen-lg sm:w-96" action="{{route('loginSubmit')}}" method="post" id="loginForm">
            @csrf
            <div class="mb-1 flex flex-col gap-6">
                <div class="w-full max-w-sm min-w-[200px]">
                    <input type="email" name="email"
                        class="w-full placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2"
                        placeholder="Your Email" />
                </div>
                <div class="w-full max-w-sm min-w-[200px]">
                    <input type="password" name="password"
                        class="w-full placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2"
                        placeholder="Your Password" />
                </div>
            </div>
            <div class="inline-flex items-center mt-2">
                <label class="flex items-center cursor-pointer relative" for="check-2">
                    <input type="checkbox"
                        class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                        id="check-2" />
                    <span
                        class="absolute text-white opacity-0 pointer-events-none peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                            fill="currentColor" stroke="currentColor" stroke-width="1">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </label>
                {{-- this is about the coockie session  --}}
                <label class="cursor-pointer ml-2 text-slate-600 text-sm" for="check-2">
                    Remember Me
                </label>
            </div>
            <button
                class="oauthButton mt-4 w-full py-2 px-4 border rounded-md relative overflow-hidden cursor-pointer text-center text-sm transition-all"
                type="submit">
                <div>
                    Sign Up
                </div>
            </button>
        </form>
    </section>
    <!-- Custom Loading Overlay -->
    <div id="custom-loader" class="fixed inset-0 bg-[#212121] bg-opacity-80 z-50 flex items-center justify-center hidden">
        <div class="flex flex-row gap-2">
            <div class="w-[20px] h-[20px] rounded-full bg-white animate-bounce"></div>
            <div
                class="w-[20px] h-[20px] rounded-full bg-white animate-bounce [animation-delay:-.3s]"
            ></div>
            <div
                class="w-[20px] h-[20px] rounded-full bg-white animate-bounce [animation-delay:-.5s]"
            ></div>
        </div>

    </div>


    @if(session('sweet-alert'))

        <script>
            document.addEventListener('DOMContentLoaded',function (){
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "error",
                    title: "something wrong"
                });
            });
        </script>
    @endif

</main>
<script src="{{ asset('js/auth-login.js') }}"></script>
<style>
    .form {
        --background: #d3d3d3;
        --input-focus: #2d8cf0;
        --font-color: #323232;
        --font-color-sub: #666;
        --bg-color: #fff;
        --main-color: #323232;
        padding: 20px;
        background: var(--background);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        gap: 20px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        box-shadow: 4px 4px var(--main-color);
    }

    .form input {
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        color: var(--font-color);
        outline: none;
    }

    .oauthButton {
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        color: var(--font-color);
        outline: none;
        z-index: 1;
    }

    .oauthButton::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 0;
        background-color: #212121;
        z-index: -1;
        -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
        box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
        transition: all 250ms;
    }

    .oauthButton:hover {
        color: #e8e8e8;
    }

    .oauthButton:hover::before {
        width: 100%;
    }
</style>
<script>
    const loginUrl = "{{ route('loginSubmit') }}";
</script>

