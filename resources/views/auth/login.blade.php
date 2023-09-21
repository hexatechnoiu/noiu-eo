@extends('layouts.dashboardmain')

@section('container')

    @if (session('showAlert'))
    <div class="flex justify-end">
        <div id="alert-3" class="flex flex-row items-center px-4 py-3 mb-4 mt-5 mr-5 text-green-800 bg-green-100 fixed" role="alert">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-check"></i>
                <span class="sr-only">Info</span>
                <div class="ml-4 mr-2 text-sm font-medium">
                    Registrated successfully!
                </div>
            </div>
            <button type="button" class="text-green-500 hover:bg-green-200 duration-[400ms] rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="w-full h-1 bg-gray-300 mt-2 absolute bottom-0 left-0">
                <div id="time-bar" class="h-1 bg-green-500" style="width: 100%;"></div>
            </div>
        </div>
    </div>
    @endif

    <section class="flex flex-col items-center justify-center px-6 py-10 mx-auto md:h-screen">
        <div class="w-full bg-white rounded-lg shadow-xl border border-neutral-20 my-4 sm:max-w-md">
            <img src="{{ asset('img/logo-eo-blue.svg') }}" class="h-16 mt-6 mx-auto" alt="NOIU Logo" />

            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-black md:text-2xl">
                    Sign in to Your Account
                </h1>
                <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                    @csrf
                    @if (session()->has('loginError'))
                    <div class="flex bg-red-700 text-white p-1.5 rounded-lg justify-center">
                        {{ session('loginError') }}
                    </div>
                    @endif
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                        <input value="{{old('email')}}" type="email" name="email" id="email" class="bg-white border @error('email') border-red-700 @enderror text-black sm:text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="hexatechnoiu@gmail.com" required>
                        @error('email')
                        <div class="text-red-900">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-black">Password</label>
                        <div class="relative flex items-center">
                            <input type="password" name="password" id="password" placeholder="Your Password" autocomplete="none" class="bg-white border text-black sm:text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5 pr-10" required>
                            <span id="togglePassword" class="toggle-password cursor-pointer absolute right-4 top-1/2 transform -translate-y-1/2" onclick="togglePasswordField()">
                                <i id="eyeIcon" class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                        @error('password')
                        <div class="text-red-700">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Sign in
                    </button>
                    <p class="text-sm text-center font-light text-neutral-60">
                        Don’t have an account yet?
                        <a href="register" class="font-medium text-primary-40 hover:opacity-70 duration-[400ms]">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
    @endsection

    <script>
        function togglePasswordField() {
            const passwordField = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        };
    </script>
