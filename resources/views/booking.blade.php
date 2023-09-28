@extends('layouts.main')

@section('container')
    <!-- Start block -->
    <section class="bg-white p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl text-center py-10 px-4 lg:px-6">
            <h2 class="flex justify-center mb-8 text-2xl sm:text-4xl tracking-tight font-extrabold text-black">Booking</h2>

            <!-- Start coding here -->
            <div class="bg-neutral-10 relative shadow-2xl sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center" method="GET">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fa-solid fa-magnifying-glass w-5 h-5 text-neutral-60"></i>
                                </div>
                                <input type="text" id="simple-search" name="search" value="{{ request('search')}}""
                                    class="bg-white border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full pl-10 p-2"
                                    placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="flex items-center justify-center text-white bg-primary-40 hover:text-black hover:bg-secondary-40 focus:ring-4 focus:ring-secondary-20 duration-[400ms] font-medium rounded-lg text-sm px-4 py-2"
                            type="button"><i class="fa-solid fa-cart-shopping mr-2"></i>Booking Now</button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-neutral-20 rounded-lg shadow-lg w-full md:w-[168px]">
                            <ul class="py-2 text-sm text-neutral-60 text-center" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="{{ route('outbound') }}" class="block px-4 py-2 hover:bg-neutral-20 duration-[400ms]">Outbound Package</a>
                                </li>
                                <li>
                                    <a href="{{ route('mice') }}" class="block px-4 py-2 hover:bg-neutral-20 duration-[400ms]">Event Organizer</a>
                                </li>
                            </ul>
                      </div>
                  </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-neutral-60">
                        <thead class="text-xs text-neutral-60 uppercase bg-neutral-10">
                            <tr>
                                <th scope="col" class="px-4 py-4">Full Name</th>
                                <th scope="col" class="px-4 py-3">Package Name</th>
                                <th scope="col" class="px-4 py-3">For Date</th>
                                <th scope="col" class="px-4 py-3">Price</th>
                                <th scope="col" class="px-4 py-3">Payment Method</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking as $book)
                                <tr class="border-b">
                                    <td class="px-4 py-3">{{ $book->name }}</td>
                                    <td class="px-4 py-3 max-w-[14rem]">{{ $book->package->name }}</td>
                                    <td class="px-4 py-3">{{ $book->date }}</td>
                                    <td class="px-4 py-3">Rp. {{ number_format($book->package->price, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">{{ $book->payment_method }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="booking-dropdown-button{{ $book->id }}"
                                            onclick="booking_detail({{ $book->id }})"
                                            data-dropdown-toggle="booking-dropdown"
                                            class="inline-flex items-center font-medium hover:bg-neutral-20 py-3.5 px-2 text-center text-neutral-60 hover:text-black duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 focus:border-primary-10"
                                            data-name="{{ $book->name }}" data-phone="{{ $book->phone }}"
                                            data-payment-method="{{ $book->payment_method }}"
                                            data-package-name="{{ $book->package->name }}"
                                            data-package-price="{{ $book->package->price }}"
                                            data-package-category="{{ $book->package->package_type->name }}"
                                            data-date="{{ $book->date }}" type="button">
                                            <i class="fa-solid fa-ellipsis fa-lg"></i>
                                        </button>
                                        <div id="booking-dropdown"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-neutral-20 shadow">
                                            <ul class="py-1 text-sm" aria-labelledby="booking-dropdown-button">
                                                <li>
                                                    <button disabled type="button" data-modal-target="updateBookingModal"
                                                        data-modal-toggle="updateBookingModal"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                        <span>Edit</span>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-modal-target="readBookingModal"
                                                        data-modal-toggle="readBookingModal"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                        <i class="fa-solid fa-eye mr-2"></i>
                                                        Preview
                                                    </button>
                                                </li>
                                                <li>
                                                    <button disabled type="button" data-modal-target="deleteModal"
                                                        data-modal-toggle="deleteModal"
                                                        class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-red-500">
                                                        <i class="fa-solid fa-trash-can mr-2"></i>
                                                        Remove
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($booking->lastItem() < 2)
                @else
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation">
                        <span class="text-sm font-normal text-neutral-60">
                            Showing
                            <span class="font-semibold text-black">
                                {{ $booking->firstItem() }}-{{ $booking->lastItem() }}
                            </span>
                            of
                            <span class="font-semibold text-black">{{ $booking->total() }}</span>
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li>
                                <a href="{{ $booking->previousPageUrl() }}"
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-neutral-60 bg-white rounded-l-lg border border-neutral-30 hover:bg-neutral-20 hover:text-black duration-[400ms] {{ $booking->onFirstPage() ? 'cursor-not-allowed' : '' }}">
                                    <span class="sr-only">Previous</span>
                                    <i class="fa-solid fa-chevron-left fa-sm"></i>
                                </a>
                            </li>
                            @foreach ($booking->getUrlRange(1, $booking->lastPage()) as $page => $url)
                                <li>
                                    <a href="{{ $url }}"
                                        class="flex items-center justify-center text-sm py-2 px-3 leading-tight {{ $page == $booking->currentPage() ? 'text-black bg-neutral-20' : 'text-neutral-60 bg-white' }} border border-neutral-30 hover:bg-neutral-20 hover:text-black duration-[400ms] {{ $page == $booking->currentPage() ? 'z-10' : '' }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ $booking->nextPageUrl() }}"
                                    class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-neutral-60 bg-white rounded-r-lg border border-neutral-30 hover:bg-neutral-20 hover:text-black duration-[400ms] {{ $booking->hasMorePages() ? '' : 'cursor-not-allowed' }}">
                                    <span class="sr-only">Next</span>
                                    <i class="fa-solid fa-chevron-right fa-sm"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </section>
    <!-- End block -->


    @include('partials.booking_modal')
    <!-- Update modal -->
    <div id="updateBookingModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Booking</h3>
                    <button type="button"
                        class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center"
                        data-modal-target="updateBookingModal" data-modal-toggle="updateBookingModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form method="GET">
                    <h3 class="text-lg font-semibold text-black mb-4">Data Customer :</h3>
                    <div class="grid gap-4 mb-4 sm:grid-cols-3">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-black">Full Name</label>
                            <input type="text" name="name" id="name" value="Hafiz Haekal"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Your Name" required>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-black">Phone Number</label>
                            <input type="number" name="phone" id="phone" value="087894818815"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="085771805236" required>
                        </div>
                        <div>
                            <label for="payment" class="block mb-2 text-sm font-medium text-black">Payment Method</label>
                            <select id="payment"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5">
                                <option selected="">Select Payment Method</option>
                                <option value="Debit">Debit</option>
                                <option value="Credit">Credit</option>
                                <option value="Gopay">Gopay</option>
                                <option value="ShopeePay">ShopeePay</option>
                                <option value="Dana">Dana</option>
                                <option value="Ovo">Ovo</option>
                            </select>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-black mt-8 mb-4">Data Package :</h3>
                    <div class="grid gap-4 mb-4 sm:grid-cols-3">
                        <div>
                            <label for="packageName" class="block mb-2 text-sm font-medium text-black">Package
                                Name</label>
                            <input type="text" name="packageName" id="packageName"
                                value="Paket Outbound 2 Hari 1 Malam"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Package Name" required>
                        </div>
                        <div>
                            <label for="category_disabled"
                                class="block mb-2 text-sm font-medium text-black">Category</label>
                            <select disabled id="category_disabled"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5">
                                <option selected="">Select Category</option>
                                <option value="Outbound">Outbound</option>
                                <option value="Offroad">Offroad</option>
                                <option value="Rafting">Rafting</option>
                                <option value="Meeting">Meeting</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div>
                            <label for="date" class="block mb-2 text-sm font-medium text-black">For Date</label>
                            <input type="date" name="date" id="date"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Rp. 250.000" required>
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-black">Price</label>
                            <input type="text" name="price" id="price" value="Rp. 850.000"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Rp. 250.000" required>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Update Booking
                        </button>
                        <button type="button"
                            class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <i class="fa-solid fa-trash-can mr-2"></i>
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Read modal -->
    <div id="readBookingModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Booking Details</h3>
                    <button type="button"
                        class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center"
                        data-modal-target="readBookingModal" data-modal-toggle="readBookingModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <h3 class="text-lg font-semibold text-black mt-8 mb-4">Data Customer :</h3>
                <div class="grid gap-4 pb-5 mb-4 sm:grid-cols-3 border-b">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-black">Full Name</label>
                        <span class="font-light text-base text-neutral-60" id="read_user_name"></span>
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-black">Phone Number</label>
                        <span class="font-light text-base text-neutral-60" id="read_user_phone">087894818815</span>
                    </div>
                    <div>
                        <label for="payment" class="block mb-2 text-sm font-medium text-black">Payment Method</label>
                        <span class="font-light text-base text-neutral-60" id="read_payment_method"></span>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-black mb-4">Data Package :</h3>
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="w-full">
                        <label for="packageName" class="block mb-2 text-sm font-medium text-black">Package Name</label>
                        <span class="font-light text-base text-neutral-60" id="read_package_name"></span>
                    </div>
                    <div class="sm:ml-[34.5%]">
                        <label for="category" class="block mb-2 text-sm font-medium text-black">Category</label>
                        <span class="font-light text-base text-neutral-60" id="read_package_category"></span>
                    </div>
                    <div class="w-full">
                        <label for="date" class="block mb-2 text-sm font-medium text-black">For Date</label>
                        <span class="font-light text-base text-neutral-60" id="read_date">21/05/2006</span>
                    </div>
                    <div class="sm:ml-[34.5%]">
                        <label for="price" class="block mb-2 text-sm font-medium text-black">Price</label>
                        <span class="font-light text-base text-neutral-60" id="read_package_price"></span>
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
                <p class="mb-4 text-neutral-60">Are you sure you want to delete this booked?</p>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteModal" type="button"
                        class="py-2 px-3 text-sm font-medium text-neutral-60 bg-white rounded-lg border border-neutral-30 hover:bg-neutral-20 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 hover:text-black focus:z-10">No,
                        cancel</button>
                    <button type="submit"
                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-red-300">Yes,
                        I'm sure</button>
                </div>
            </div>
        </div>
    </div>
@endsection
