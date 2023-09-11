@extends('layouts.main')

@section('container')

    <section class="flex flex-col items-center justify-center px-6 py-10 mx-auto md:h-screen">
        <div class="w-full bg-white rounded-lg border border-Neutral-20 shadow-xl my-4 sm:max-w-xl">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-black md:text-2xl">
                    Create an Account
                </h1>
                <form action="/register" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="image" class="block mb-2 text-sm font-medium text-black">Profil Picture</label>
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror bg-Neutral-10 border border-Neutral-20 text-black text-sm rounded-lg focus:ring-Primary-20 focus:border-Primary-40 block w-full cursor-pointer">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            @error('name')
                            <div class="bg-red-800 text-white rounded-lg p-1">{{ $message }}</div>
                            @enderror
                            <label for="name" class="block mb-2 text-sm font-medium text-black">Full Name</label>
                            <input type="text" name="name" id="name" class="bg-Neutral-10 border border-Neutral-20 text-black text-sm rounded-lg focus:ring-Primary-20 focus:border-Primary-40 block w-full p-2.5" placeholder="Your Name" required="">
                        </div>
                        <div>
                            @error('email')
                            <div class="bg-red-800 text-white rounded-lg p-1">{{ $message }}</div>
                            @enderror
                            <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                            <input type="email" name="email" id="email" class="bg-Neutral-10 border border-Neutral-20 text-black text-sm rounded-lg focus:ring-Primary-20 focus:border-Primary-40 block w-full p-2.5" placeholder="hexatechnoiu@gmail.com" required="">
                        </div>
                        <div>
                            @error('phone')
                            <div class="bg-red-800 text-white rounded-lg p-1">{{ $message }}</div>
                            @enderror
                            <label for="phone" class="block mb-2 text-sm font-medium text-black">Phone</label>
                            <input type="text" name="phone" id="phone" class="bg-Neutral-10 border border-Neutral-20 text-black text-sm rounded-lg focus:ring-Primary-20 focus:border-Primary-40 block w-full p-2.5" placeholder="Your Phone" required="">
                        </div>
                            @error('address')
                                <div class="bg-red-800 text-white rounded-lg p-1">{{ $message }}</div>
                            @enderror
                            <div class="sm:col-span-2"><label for="address" class="block mb-2 text-sm font-medium text-black">Address</label><textarea name="address" id="address" rows="4" class="block p-2.5 w-full text-sm text-black bg-Neutral-10 rounded-lg border border-Neutral-20 focus:ring-Primary-20 focus:border-Primary-40" placeholder="Your Address"></textarea></div>
                        <div>
                            @error('password')
                            <div class="bg-red-800 text-white rounded-lg p-1">{{ $message }}</div>
                            @enderror
                            <label for="password" class="block mb-2 text-sm font-medium text-black">Password</label>
                            <input type="password" name="password" id="password" class="bg-Neutral-10 border border-Neutral-20 text-black text-sm rounded-lg focus:ring-Primary-20 focus:border-Primary-40 block w-full p-2.5" placeholder="Your Password" required="">
                        </div>
                        <div>
                            @error('confirm-password')
                            <div class="bg-red-800 text-white rounded-lg p-1">{{ $message }}</div>
                            @enderror
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-black">Confirm Password</label>
                            <input type="password" name="confirm-password" id="confirm-password" class="bg-Neutral-10 border border-Neutral-20 text-black text-sm rounded-lg focus:ring-Primary-20 focus:border-Primary-40 block w-full p-2.5" placeholder="Confirm Your Password" required="">
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-Primary-40 hover:text-black hover:bg-Secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-Primary-10 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Create an Account
                    </button>
                    <p class="text-sm font-light text-center text-Neutral-60 mt-4">
                        Already have an account?
                        <a href="/login" class="font-medium text-Primary-40 hover:opacity-70 duration-[400ms]">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </section>

@endsection
