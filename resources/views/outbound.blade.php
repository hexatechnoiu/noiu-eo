@extends('layouts.main')

@section('container')

    @foreach ($data as $pc)
    @foreach ($pc->package_types as $tpkg)
    <section id="{{$tpkg->name}}" class="bg-center bg-no-repeat bg-white bg-blend-multiply pt-20 pb-5">
        <div class="px-4 mx-auto max-w-screen-xl text-center">
            <h1
                class="mb-2 text-3xl font-extrabold tracking-tight leading-none text-black sm:text-4xl md:text-5xl lg:text-6xl">
                {{$tpkg->name}} Package</h1>
            <p class="mb-8 text-lg font-normal text-neutral-40 lg:text-xl sm:px-16 lg:px-48">Paket {{$tpkg->name}}</p>
        </div>
        <div class="flex flex-wrap justify-start lg:mx-0">
            @foreach ($tpkg->packages as $pkg)
                
            <div class="max-w-xs bg-white border border-neutral-20 rounded-lg shadow mx-auto md:mx-0 mb-5 md:ml-9">
                <a href="#">
                    <img class="rounded-t-lg w-[318px] h-[229px]" src="{{ $pkg->picture }}"
                        alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-black">{{ $pkg->name }}</h5>
                    </a>
                    <p class="mb-2 text-lg font-semibold tracking-tight text-primary-40">Rp {{ $pkg->price }}<span
                            class="text-sm font-medium text-neutral-60"> /{{ $pkg->unit }}</span></p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary-40 rounded-lg hover:text-black hover:bg-secondary-40 focus:ring-4 focus:outline-none focus:ring-secondary-20 duration-200">
                        See Detail
                        <i class="fa-solid fa-arrow-right fa-sm ml-2"></i>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    @endforeach
    @endforeach

@endsection
