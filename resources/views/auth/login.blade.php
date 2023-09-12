@extends('layouts.main')

@section('container')

    <section class="flex flex-col items-center justify-center px-6 py-10 mx-auto md:h-screen">
        <div class="w-full bg-white rounded-lg shadow-xl border border-neutral-20 my-4 sm:max-w-md">
        <img src="{{ asset('img/logo-eo-blue.svg') }}" class="h-16 mt-6 mx-auto" alt="NOIU Logo" />
        
            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                Toggle modal
            </button>

            @if (session('showModal'))
            <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow">
                        <button type="button" class="absolute top-3 right-2.5 text-neutral-60 bg-transparent hover:text-black hover:bg-neutral-20 duration-[400ms] rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                            <i class="fa-solid fa-xmark fa-xl"></i>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <i class="fa-regular fa-circle-check mx-auto mb-4 text-primary-40 text-6xl"></i>
                            <h3 class="mb-5 text-lg font-normal text-neutral-60">Registrated Successfully</h3>
                            <button type="button" class="text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 font-normal rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" data-modal-hide="popup-modal">
                                Yes, I'm sure
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
  
            {{-- @if (session()->has('success'))
                <div class="bg-green-600 text-white p-1.5">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-black md:text-2xl">
                    Sign in to Your Account
                </h1>
                <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                    @csrf
                    @if (session()->has('loginError'))
                        <div class="bg-red-900 text-white p-1.5">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                        <input value="{{old('email')}}" type="email" name="email" id="email" class="bg-white border border-neutral-20 text-black sm:text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="hexatechnoiu@gmail.com" required>
                        @error('email')
                        <div class="text-red-900">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-black">Password</label>
                        <input type="password" name="password" id="password" placeholder="Your Password" class="bg-white border border-neutral-20 text-black sm:text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" required>
                        @error('password')
                        <div class="text-red-900">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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

    {{-- Modal --}}

    <script>
        // Hapus data "showModal" setelah modal ditampilkan
        @if (session('showModal'))
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById("popup-modal").classList.remove("hidden");
                @php
                    session()->forget('showModal');
                @endphp
            });
        @endif
    </script>


@endsection
