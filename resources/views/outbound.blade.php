@extends('layouts.main')

@section('container')

<script>
    
    viewModal = function(array) {
        let picture_modal = document.getElementById('img_modal');
        let name_modal = document.getElementById('name_modal');
        let category_modal = document.getElementById('cat_modal');
        let unit_modal = document.getElementById('unit_modal');
        let price_modal = document.getElementById('price_modal');
        let desc_modal = document.getElementById('desc_modal');

        // Menggunakan operator nullish (??) untuk mengisi elemen-elemen modal
        picture_modal.src = array.picture;
        name_modal.innerHTML = array.name;
        category_modal.innerHTML = array.Package_type;
        unit_modal.innerHTML = array.unit;
        price_modal.innerHTML = array.price;
        desc_modal.innerHTML = array.desc;
    }
</script>

    @foreach ($data as $pc)
        @foreach ($pc->package_types as $tpkg)
            <section id="{{ $tpkg->name }}" class="bg-center bg-no-repeat bg-white bg-blend-multiply pt-20 pb-5">
                <div class="px-4 mx-auto max-w-screen-xl text-center">
                    <h1 class="mb-2 text-3xl font-extrabold tracking-tight leading-none text-black sm:text-4xl md:text-5xl lg:text-6xl">
                        {{ $tpkg->name }} Package</h1>
                    <p class="mb-8 text-lg font-normal text-neutral-40 lg:text-xl sm:px-16 lg:px-48">
                        Paket {{ $tpkg->name }}</p>
                </div>
                <div class="flex flex-wrap justify-start right lg:mx-0">
                    @foreach ($tpkg->packages as $pkg)
                        <div class="max-w-xs bg-white border border-neutral-20 rounded-lg shadow mx-auto md:mx-0 mb-5 md:ml-9">
                            <div>
                                <img class="rounded-t-lg w-[318px] h-[229px]" src="{{ $pkg->picture }}" alt="" />
                            </div>
                            <div class="p-5">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-black">{{ $pkg->name }}</h5>
                                <p class="mb-2 text-lg font-semibold tracking-tight text-primary-40">Rp.
                                    {{ $pkg->price }}<span class="text-sm font-medium text-neutral-60"> /Orang</span></p>
                                <button id="btnSeeDetail" onclick="viewModal({{ $pkg }})" data-anu="{{ $tpkg->name }}" type="button" data-modal-target="seeDetailModal" data-modal-toggle="seeDetailModal" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary-40 rounded-lg hover:text-black hover:bg-secondary-40 focus:ring-4 focus:outline-none focus:ring-secondary-20 duration-[400ms]">
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
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100% - 1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-5xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex flex-row gap-4">
                    <div class="flex justify-between mb-4 rounded-t sm:mb-5 w-[60rem]">
                        <img id="img_modal" class="mb-4 w-full rounded-lg" alt="Image">
                    </div>
                    <div>
                        <dl>
                            <h3 id="name_modal" class="mb-6 text-2xl text-black font-semibold"></h3>
                            <dt class="mt-2 font-semibold leading-none text-black">Category</dt>
                            <dd id="cat_modal" class="mb-4 font-light text-base text-neutral-60 sm:mb-5"></dd>
                        </dl>
                        <dl>
                            <dt class="mt-2 font-semibold leading-none text-black">Price</dt>
                            <dd class="mb-4 font-light text-base text-neutral-60 sm:mb-5">Rp. <span id="price_modal"></span> /<span id="unit_modal"></span></dd>
                        </dl>
                        <dl>
                            <dt class="mt-2 font-semibold leading-none text-black">Description</dt>
                            <dd id="desc_modal" class="mb-4 font-light text-neutral-60 sm:mb-5"></dd>
                        </dl>
                    </div>
                    <div>
                        <button type="button"
                            class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 inline-flex"
                            data-modal-toggle="seeDetailModal">
                            <i class="fa-solid fa-xmark fa-xl"></i>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button"
                            class="text-white inline-flex items-center bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                            Edit
                        </button>
                        <button type="button"
                            class="py-2.5 px-5 text-sm font-medium text-black focus:outline-none bg-white rounded-lg border border-neutral-30 hover:bg-neutral-20 hover:text-primary-40 duration-[400ms] focus:z-10 focus:ring-4 focus:ring-primary-10">Preview</button>
                    </div>
                    <button type="button"
                        class="inline-flex items-center text-white bg-red-600 hover:bg-red-800 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="fa-solid fa-trash-can mr-2"></i>
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

