@extends('layouts.main')

@section('container')

{{-- Meeting Package --}}
<section class="bg-center bg-no-repeat bg-white bg-blend-multiply pt-20 pb-5">
    <div class="px-4 mx-auto max-w-screen-xl text-center">
        <h1 class="mb-2 text-3xl font-extrabold tracking-tight leading-none text-black sm:text-4xl md:text-5xl lg:text-6xl">Meeting Package</h1>
        <p class="mb-8 text-lg font-normal text-Neutral-40 lg:text-xl sm:px-16 lg:px-48">Paket Rapat</p>
    </div>

    {{-- Cards Package --}}
    <div class="flex flex-wrap justify-start lg:mx-0">
        <div class="max-w-xs bg-white border border-Neutral-20 rounded-lg shadow mx-auto md:mx-0 mb-5 md:ml-9">
            <a href="#">
                <img class="rounded-t-lg w-[318px] h-[229px]" src="{{ asset('img/meeting1.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h1 class="mb-2 text-xl font-bold tracking-tight text-black">Paket Meeting</h1>
                </a>
                <p class="mb-2 text-lg font-semibold tracking-tight text-Primary-40">Rp 0<span class="text-sm font-medium text-Neutral-60"> /Orang</span></p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-Primary-40 rounded-lg hover:text-black hover:bg-Secondary-40 focus:ring-4 focus:outline-none focus:ring-Secondary-20 duration-200">
                    See Detail
                    <i class="fa-solid fa-arrow-right fa-sm ml-2"></i>
                </a>
            </div>
        </div>
        <div class="max-w-xs bg-white border border-Neutral-20 rounded-lg shadow mx-auto md:mx-0 mb-5 md:ml-9">
            <a href="#">
                <img class="rounded-t-lg w-[318px] h-[229px]" src="{{ asset('img/meeting2.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-black">Paket Pemasangan Backdrop</h5>
                </a>
                <p class="mb-2 text-lg font-semibold tracking-tight text-Primary-40">Rp 0<span class="text-sm font-medium text-Neutral-60"> /Orang</span></p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-Primary-40 rounded-lg hover:text-black hover:bg-Secondary-40 focus:ring-4 focus:outline-none focus:ring-Secondary-20 duration-200">
                    See Detail
                    <i class="fa-solid fa-arrow-right fa-sm ml-2"></i>
                </a>
            </div>
        </div>
        <div class="max-w-xs bg-white border border-Neutral-20 rounded-lg shadow mx-auto md:mx-0 mb-5 md:ml-9">
            <a href="#">
                <img class="rounded-t-lg w-[318px] h-[229px]" src="{{ asset('img/meeting3.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-black">LED Screen Videotron</h5>
                </a>
                <p class="mb-2 text-lg font-semibold tracking-tight text-Primary-40">Rp 0<span class="text-sm font-medium text-Neutral-60"> /Orang</span></p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-Primary-40 rounded-lg hover:text-black hover:bg-Secondary-40 focus:ring-4 focus:outline-none focus:ring-Secondary-20 duration-200">
                    See Detail
                    <i class="fa-solid fa-arrow-right fa-sm ml-2"></i>
                </a>
            </div>
        </div>
        <div class="max-w-xs bg-white border border-Neutral-20 rounded-lg shadow mx-auto md:mx-0 mb-5 md:ml-9">
            <a href="#">
                <img class="rounded-t-lg w-[318px] h-[229px]" src="{{ asset('img/meeting4.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-black">Live Streaming</h5>
                </a>
                <p class="mb-2 text-lg font-semibold tracking-tight text-Primary-40">Rp 0<span class="text-sm font-medium text-Neutral-60"> /Orang</span></p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-Primary-40 rounded-lg hover:text-black hover:bg-Secondary-40 focus:ring-4 focus:outline-none focus:ring-Secondary-20 duration-200">
                    See Detail
                    <i class="fa-solid fa-arrow-right fa-sm ml-2"></i>
                </a>
            </div>
        </div>
        <div class="max-w-xs bg-white border border-Neutral-20 rounded-lg shadow mx-auto md:mx-0 mb-5 md:ml-9">
            <a href="#">
                <img class="rounded-t-lg w-[318px] h-[229px]" src="{{ asset('img/meeting5.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-black">Sound System</h5>
                </a>
                <p class="mb-2 text-lg font-semibold tracking-tight text-Primary-40">Rp 0<span class="text-sm font-medium text-Neutral-60"> /Orang</span></p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-Primary-40 rounded-lg hover:text-black hover:bg-Secondary-40 focus:ring-4 focus:outline-none focus:ring-Secondary-20 duration-200">
                    See Detail
                    <i class="fa-solid fa-arrow-right fa-sm ml-2"></i>
                </a>
            </div>
        </div>
        <div class="max-w-xs bg-white border border-Neutral-20 rounded-lg shadow mx-auto md:mx-0 mb-5 md:ml-9">
            <a href="#" class="block relative overflow-hidden group">
                <img class="w-[318px] h-[229px] transform origin-center group-hover:scale-110 transition-transform duration-[400ms]" src="{{ asset('img/meeting6.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-black">Spin 360 Video Both</h5>
                </a>
                <p class="mb-2 text-lg font-semibold tracking-tight text-Primary-40">Rp 0<span class="text-sm font-medium text-Neutral-60"> /Orang</span></p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-Primary-40 rounded-lg hover:text-black hover:bg-Secondary-40 focus:ring-4 focus:outline-none focus:ring-Secondary-20 duration-200">
                    See Detail
                    <i class="fa-solid fa-arrow-right fa-sm ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection