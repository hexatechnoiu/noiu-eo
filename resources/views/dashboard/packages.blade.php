@extends('layouts.dashboardmain')

@section('container')

    @if (session('success'))
    <div class="flex justify-end">
        <div id="alert-3" class="flex flex-row items-center px-4 py-3 mb-4 mt-5 mr-5 text-green-800 bg-green-100 fixed z-50" role="alert">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-check"></i>
                <span class="sr-only">Info</span>
                <div class="ml-4 mr-2 text-sm font-medium">
                    {{ session('success') }}
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

    @foreach ($errors->all() as $e)
        <div class="top-0 right-0 z-auto bg-sky-900 text-sky-100">{{ $e }}</div>
    @endforeach

    <!-- Start block -->
    <section class="bg-white p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl text-center py-10 px-4 lg:px-6">
            <div class="flex items-start mb-8 max-w-screen-sm gap-[15vw] md:gap-[25vw]">
                <a href="/dashboard"
                    class="text-sm font-medium py-1 px-2 sm:py-1.5 sm:px-3 rounded-lg tracking-tight text-black bg-secondary-40 hover:text-white hover:bg-primary-40 duration-[400ms]"><i
                        class="fa-solid fa-arrow-left mr-2"></i>Back</a>
                <h2 class="flex justify-center mb-2 text-2xl sm:text-4xl tracking-tight font-extrabold text-black">Packages
                </h2>
            </div>
            <!-- Start coding here -->
            <div class="bg-neutral-10 relative shadow-2xl sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fa-solid fa-magnifying-glass w-5 h-5 text-neutral-60"></i>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-white border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full pl-10 p-2"
                                    placeholder="Search" required>
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" id="createPackageModalButton" data-modal-target="createPackageModal"
                            data-modal-toggle="createPackageModal"
                            class="flex items-center justify-center text-white bg-primary-40 hover:text-black hover:bg-secondary-40 focus:ring-4 focus:ring-primary-10 duration-[400ms] font-medium rounded-lg text-sm px-4 py-2">
                            <i class="fa-solid fa-plus mr-2"></i>
                            <span>Add New Package</span>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-neutral-60">
                        <thead class="text-xs text-neutral-60 uppercase bg-neutral-10">
                            <tr>
                                <th scope="col" class="px-4 py-4">Picture</th>
                                <th scope="col" class="px-4 py-3">Package Name</th>
                                <th scope="col" class="px-4 py-3">Category</th>
                                <th scope="col" class="px-4 py-3">Price</th>
                                <th scope="col" class="px-4 py-3">description</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($package_type as $pkg_type)
                                @foreach ($pkg_type->packages as $pkg)
                                    <tr class="border-b">
                                        <td class="px-4 py-3 max-w-[5rem]"><img src="{{ asset('/storage/' . $pkg->picture) }}"></td>
                                        <td class="px-4 py-3 max-w-[10rem]">{{ $pkg->name }}</td>
                                        <td class="px-4 py-3 max-w-[10rem]">{{ $pkg->package_type->name }}</td>
                                        <td class="px-4 py-3">{{ $pkg->price }}</td>
                                        <td scope="row" class="px-4 py-3 max-w-[12rem] truncate">{{ $pkg->desc }}</td>
                                        <td class="px-4 py-8 flex items-center justify-end">
                                            <button id="package-dropdown-button{{ $pkg->id }}"
                                            data-picture="{{ asset('/storage/'.$pkg->picture) }}"
                                            data-id="{{ $pkg->id }}"
                                            data-name="{{ $pkg->name }}"
                                            data-cat_id="{{ $pkg->package_type->id }}"
                                            data-category="{{ $pkg->package_type->name }}"
                                            data-price="{{ $pkg->price }}"
                                            data-desc="{{ $pkg->desc }}"

                                            onclick="transfer_data({{ $pkg->id }})"
                                                data-dropdown-toggle="package-dropdown"
                                                class="font-medium hover:bg-neutral-20 py-1.5 px-2 my-auto text-center text-neutral-60 hover:text-black duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 focus:border-primary-10"
                                                type="button">
                                                <i class="fa-solid fa-ellipsis fa-lg"></i>
                                            </button>
                                            <div id="package-dropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-neutral-20 shadow">
                                                <ul class="py-1 text-sm" aria-labelledby="package-dropdown-button">
                                                    <li>
                                                        <button type="button" data-modal-target="updatePackageModal"
                                                            data-modal-toggle="updatePackageModal"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                            <span>Edit</span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button" data-modal-target="readPackageModal"
                                                            data-modal-toggle="readPackageModal"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                            <i class="fa-solid fa-eye mr-2"></i>
                                                            Preview
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="button" data-modal-target="deleteModal"
                                                            data-modal-toggle="deleteModal"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-red-500">
                                                            <i class="fa-solid fa-trash-can mr-2"></i>
                                                            Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            @empty
                                <p>empty :/</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-neutral-60">
                        Showing
                        <span class="font-semibold text-black">1-10</span>
                        of
                        <span class="font-semibold text-black">1000</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-neutral-60 bg-white rounded-l-lg border border-neutral-30 hover:bg-neutral-20 hover:text-black">
                                <span class="sr-only">Previous</span>
                                <i class="fa-solid fa-chevron-left fa-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">3</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">...</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">100</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-neutral-60 bg-white rounded-r-lg border border-neutral-30 hover:bg-neutral-20 hover:text-black">
                                <span class="sr-only">Next</span>
                                <i class="fa-solid fa-chevron-right fa-sm"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- End block -->

    <!-- Create modal -->
    <div id="createPackageModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Add Package</h3>
                    <button type="button"
                        class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center"
                        data-modal-target="createPackageModal" data-modal-toggle="createPackageModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form action="/dashboard/packages" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="picture" class="block mb-2 text-sm font-medium text-black">Picture</label>
                            <input type="file" id="picture" name="picture"
                                class="form-control @error('Picture') is-invalid @enderror bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full cursor-pointer">
                            @error('picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-black">Package Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Package Name" required="">
                        </div>
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-black">Category</label>
                            <select id="category" name="package_type_id"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5">
                                <option>Select Category</option>
                                @foreach ($package_type as $pt)
                                    <option value="{{ $pt->id }}" id="{{ $pt->name }}">{{ $pt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-black">Price</label>
                            <input type="text" name="price" id="price"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Rp. 250.000" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="desc" class="block mb-2 text-sm font-medium text-black">Description</label>
                            <textarea name="desc" id="desc" rows="4"
                                class="block p-2.5 w-full text-sm text-black bg-neutral-10 rounded-lg border border-neutral-30 focus:ring-primary-20 focus:border-primary-40"
                                placeholder="Write Package desc Here"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="fa fa-plus mr-2"></i>
                        Add New Package
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Update modal -->
    <div id="updatePackageModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Update Package</h3>
                    <button type="button"
                        class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center"
                        data-modal-target="updatePackageModal" data-modal-toggle="updatePackageModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form enctype="multipart/form-data" id="update_modal" method="POST">
                    @csrf
                    @method('put')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="update_picture" class="block mb-2 text-sm font-medium text-black">Picture</label>
                            <input type="file" id="update_picture" name="picture" value="{{ old('picture') }}"
                                class="form-control @error('picture') is-invalid @enderror bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full cursor-pointer">
                            @error('picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="update_name" class="block mb-2 text-sm font-medium text-black">Package Name</label>
                            <input type="text" name="name" id="update_name" value="{{ old('name') }}"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Package Name" required>
                        </div>
                        <div>
                            <label for="update_category" class="block mb-2 text-sm font-medium text-black">Category</label>
                            <select id="update_category" name="package_type_id"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5">
                                <option selected="">Select Category</option>
                                @foreach ($package_type as $pt)
                                    <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="update_price" class="block mb-2 text-sm font-medium text-black">Price</label>
                            <input type="text" name="price" id="update_price"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Rp. 250.000" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="desc" class="block mb-2 text-sm font-medium text-black">Description</label>
                            <textarea name="desc" id="update_desc" rows="4"
                                class="block p-2.5 w-full text-sm text-black bg-neutral-10 rounded-lg border border-neutral-30 focus:ring-primary-20 focus:border-primary-40"
                                placeholder="Write Package desc Here"></textarea>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Update Package
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Read modal -->
    <div id="readPackageModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-5xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="md:mb-4 md:w-[600px]">
                        <img class="mb-4 w-full rounded-lg" id="pre-pic" alt="Picture">
                    </div>
                    <div class="md:w-3/4">
                        <h3 class="mb-6 text-2xl text-black font-semibold" id="pre-name"></h3>
                        <dl>
                            <dt class="mt-2 font-semibold leading-none text-black">Category</dt>
                            <dd class="mb-4 font-light text-base text-neutral-60 sm:mb-5" id="pre-category"></dd>
                        </dl>
                        <dl>
                            <dt class="mt-2 font-semibold leading-none text-black">Price</dt>
                            <dd class="mb-4 font-light text-base text-neutral-60 sm:mb-5">Rp. <span id="pre-price"></span> /<span id="unit_modal"></span></dd>
                        </dl>
                        <dl>
                            <dt class="mt-2 font-semibold leading-none text-black">Description</dt>
                            <dd class="mb-4 font-light text-neutral-60 sm:mb-5" id="pre-desc"></dd>
                        </dl>
                    </div>
                    <div>
                        <button type="button"
                            class="text-neutral-60 bg-white hover:text-white hover:bg-neutral-60 md:bg-transparent md:hover:bg-neutral-20 md:hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 inline-flex absolute top-6 right-6 md:relative md:top-0 md:right-0"
                            data-modal-toggle="readPackageModal">
                            <i class="fa-solid fa-xmark fa-xl"></i>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete modal -->
    <div id="deleteModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                <button type="button"
                    class="text-neutral-60 absolute top-2.5 right-2.5 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center"
                    data-modal-toggle="deleteModal">
                    <i class="fa-solid fa-xmark fa-xl"></i>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="text-neutral-60 w-11 h-11 my-3.5 mx-auto">
                    <i class="fa-solid fa-trash-can fa-2xl"></i>
                </div>
                <p class="mb-4 text-neutral-60">Are you sure you want to delete this package?</p>
                <div class="flex justify-center items-center">
                    <form action="/dahboard/packages" id="delete_form" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="reset" data-modal-toggle="deleteModal" type="button"
                            class="py-2 px-3 mr-3 text-sm font-medium text-neutral-60 bg-white rounded-lg border border-neutral-30 hover:bg-neutral-20 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 hover:text-black focus:z-10">No,
                            cancel</button>
                        <button type="submit"
                            class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-red-300">Yes,
                            I'm sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



