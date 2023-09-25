@extends('layouts.main')

@section('container')

    @if (session()->has('inbox'))
    <div class="flex justify-end lg:mr-[635px]">
        <div id="alert-3" class="flex flex-row items-center px-4 py-3 mb-4 mt-10 mr-5 text-primary-40 bg-primary-10 fixed animate-fade-in" role="alert">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-check"></i>
                <span class="sr-only">Info</span>
                <div class="ml-4 mr-2 text-sm font-medium">
                    {{ session('inbox') }}
                </div>
            </div>
            <button type="button" class="text-primary-40 hover:bg-blue-400 duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 p-1.5 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="w-full h-1 bg-gray-300 mt-2 absolute bottom-0 left-0">
                <div id="time-bar" class="h-1 bg-primary-40" style="width: 100%;"></div>
            </div>
        </div>
    </div>
    @endif

    {{-- Get In Touch --}}
    <section class="bg-white px-12 my-10">
        <div class="sm:grid sm:grid-cols-2 lg:flex-row gap-16 mx-auto max-w-screen-xl justify-center">
            <div class="">
                <h2 class="mb-1 text-3xl tracking-tight font-extrabold text-black sm:text-4xl">Get in Touch</h2>
                <p class="max-w-2xl mb-6 text-neutral-60 text-md">Number One I'ts You. <br> <small class="leading-tight font-light">* You can contact us below if you have any problem related to this website or our services</small></p>
                <form method="POST" action="/send">
                    @csrf
                    <div class="grid gap-6 my-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-base font-medium text-black">Full Name</label>
                            <input name="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="Your Name" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-base font-medium text-black">Email</label>
                            <input name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="hexatechnoiu@gmail.com" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block mb-2 text-base font-medium text-black">Message</label>
                        <textarea name="message" id="message" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-start sm:space-y-0 sm:space-x-4">
                        <button type="submit" href="#" class="inline-flex justify-center items-center py-2 px-5 text-base font-normal text-center text-white rounded-lg bg-primary-40 hover:text-black hover:bg-secondary-40 focus:ring-4 focus:ring-secondary-20 duration-[400ms]">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex flex-wrap max-w-screen-xl justify-center gap-10 mt-20 sm:mt-0">
                <div class="w-full h-[40%] lg:h-[250px] rounded-lg overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31685.62218651873!2d107.73568!3d-6.926088000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c34340474011%3A0x9b168ae56ab4d897!2snoiu%20event%20organizer!5e0!3m2!1sid!2sid!4v1693284698058!5m2!1sid!2sid" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="flex flex-col text-black font-light w-full">
                    <span class="mb-4 hover:text-primary-40 duration-[400ms]"><i class="fa-solid fa-phone mr-2 text-primary-40"></i>+62-857-7180-5236</span>
                    <span class="mb-4 hover:text-primary-40 duration-[400ms]"><i class="fa-solid fa-envelope mr-2 text-primary-40"></i>hexatechnoiu@gmail.com</span>
                    <span class="mb-4 hover:text-primary-40 duration-[400ms]"><i class="fa-solid fa-map-location-dot mr-2 text-primary-40"></i>Jl. Bukit Nuur No.C36, Cinunuk, Kec. Cileunyi, Kabupaten Bandung, Jawa Barat 40624</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Team --}}
    <section class="bg-white">
        <div class="max-w-screen-xl text-center py-8 px-4 mx-auto lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-2 text-4xl tracking-tight font-extrabold text-black">Our Team</h2>
                <p class="font-light text-neutral-60 sm:text-xl">HexaTech</p>
            </div>
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($ourTeams as $team)
                    <div class="max-w-xs text-sm text-center text-neutral-60 bg-white border border-neutral-20 rounded-xl shadow-lg mx-auto mb-5 p-16 hover:scale-110 transition-transform duration-[400ms]">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{ Storage::url($team->image) }}" alt="{{ $team->name }}" loading="eager">
                        <h3 class="mb-1 text-xl font-bold tracking-tight text-black">
                            {{ $team->name }}
                        </h3>
                        <p>{{ $team->role }}</p>
                        <div class="flex flex-row gap-3 justify-center mt-3">
                            <div class="flex justify-center items-center w-8 h-8 text-lg text-primary-40 hover:scale-125 hover:rotate-[720deg] transition-all duration-[400ms]">
                                <a href="{{ $team->whatsapp }}" target="blank"><i class="fa-brands fa-whatsapp fa-lg text-center"></i></a>
                            </div>
                            <div class="flex justify-center items-center w-8 h-8 text-lg text-primary-40 hover:scale-125 hover:rotate-[720deg] transition-all duration-[400ms]">
                                <a href="{{ $team->instagram }}" target="blank"><i class="fa-brands fa-instagram fa-lg text-center"></i></a>
                            </div>
                            <div class="flex justify-center items-center w-8 h-8 text-lg text-primary-40 hover:scale-125 hover:rotate-[720deg] transition-all duration-[400ms]">
                                <a href="{{ $team->github }}" target="blank"><i class="fa-brands fa-github fa-lg text-center"></i></a>
                            </div>
                            <div class="flex justify-center items-center w-8 h-8 text-lg text-primary-40 hover:scale-125 hover:rotate-[720deg] transition-all duration-[400ms]">
                                <a href="{{ $team->linkedin }}" target="blank"><i class="fa-brands fa-linkedin-in fa-lg text-center"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
