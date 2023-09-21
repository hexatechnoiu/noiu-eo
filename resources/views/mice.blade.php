@extends('layouts.main')

@section('container')

    @foreach ($data as $pc)
        @foreach ($pc->package_types as $tpkg)
            <section id="{{ strtolower($tpkg->name) }}" class="bg-center bg-no-repeat bg-white bg-blend-multiply pt-20 pb-5">
                <div class="px-4 mx-auto max-w-screen-xl text-center">
                    <h1 class="mb-2 text-3xl font-extrabold tracking-tight leading-none text-black sm:text-4xl md:text-5xl lg:text-6xl">
                        {{ $tpkg->name }} Package</h1>
                    <p class="mb-8 text-lg font-normal text-neutral-40 lg:text-xl sm:px-16 lg:px-48">
                        Paket {{ $tpkg->name }}</p>
                </div>
                <div class="flex flex-wrap justify-start right lg:mx-0">
                    @foreach ($tpkg->packages as $pkg)
                        <div class="max-w-xs bg-white border border-neutral-20 rounded-lg shadow mx-auto md:mx-0 mb-5 md:ml-9">
                            <div class="rounded-t-lg w-[318px] h-[229px] overflow-hidden">
                                <img class="object-cover w-full h-full transform origin-center hover:scale-125 transition-transform duration-500 cursor-pointer" src="{{ asset('/storage/' . $pkg->picture) }}" alt="" loading="eager" />
                            </div>
                            <div class="p-5">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-black">{{ $pkg->name }}</h5>
                                <p class="mb-2 text-lg font-semibold tracking-tight text-primary-40">Rp. {{ number_format($pkg->price, 0, ',', '.') }}<span class="text-sm font-medium text-neutral-60"> /Pax</span></p>
                                <button type="button" id="btnSeeDetail{{ $pkg->id }}" onclick="ViewModal({{ $pkg->id }})"
                                    data-category="{{ $tpkg->name }}" data-name="{{ $pkg->name }}"
                                    data-picture="{{ asset('/storage/' . $pkg->picture) }}" data-price="{{ number_format($pkg->price, 0, ',', '.') }}"
                                    data-desc="{!! $pkg->desc !!}" data-modal-target="seeDetailModal" data-modal-toggle="seeDetailModal"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary-40 rounded-lg hover:text-black hover:bg-secondary-40 focus:ring-4 focus:outline-none focus:ring-secondary-20 duration-[400ms]">
                                    See Detail
                                    <i class="fa-solid fa-arrow-right fa-sm ml-2"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach
    @endforeach
    {{-- See Detail Modal --}}
    <div id="seeDetailModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-5xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="md:mb-4 md:w-[600px]">
                        <img id="img_modal" class="mb-4 w-full h-full rounded-lg" alt="Image" loading="eager">
                    </div>
                    <div class="md:w-3/4">
                        <h3 id="name_modal" class="mb-6 text-2xl text-black font-semibold"></h3>
                        <dl>
                            <dt class="mt-2 font-semibold leading-none text-black">Category</dt>
                            <dd id="category_modal" class="mb-4 font-light text-base text-neutral-60 sm:mb-5"></dd>
                        </dl>
                        <dl>
                            <dt class="mt-2 font-semibold leading-none text-black">Price</dt>
                            <dd class="mb-4 font-light text-base text-neutral-60 sm:mb-5">Rp. <span id="price_modal"></span> /Pax</dd>
                        </dl>
                        <dl>
                            <dt class="mt-2 font-semibold leading-none text-black">Description</dt>
                            <dd id="desc_modal" class="mb-4 font-light text-neutral-60 sm:mb-5"></dd>
                        </dl>
                    </div>
                    <div>
                        <button type="button"
                            class="text-neutral-60 bg-white hover:text-white hover:bg-neutral-60 md:bg-transparent md:hover:bg-neutral-20 md:hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 inline-flex absolute top-6 right-6 md:relative md:top-0 md:right-0"
                            data-modal-toggle="seeDetailModal">
                            <i class="fa-solid fa-xmark fa-xl"></i>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
                <div class="flex justify-end items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <a href="/booking"
                            class="text-white inline-flex items-center bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <i class="fa-solid fa-plus mr-2"></i>
                            Booking Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
