{{-- See Detail Modal --}}
<div id="seeDetailModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:mb-4 md:w-[600px]">
                    <img id="img_modal" class="mb-4 w-full h-full rounded-lg object-cover" alt="Image" loading="eager">
                </div>
                <div class="md:w-3/4">
                    <h3 id="name_modal" class="mb-6 text-2xl text-black font-semibold"></h3>
                    <dl>
                        <dt class="mt-2 font-semibold leading-none text-black">Category</dt>
                        <p id="category_detail" class="mb-4 font-light text-base text-neutral-60 sm:mb-5">Anu</p>
                    </dl>
                    <dl>
                        <dt class="mt-2 font-semibold leading-none text-black">Price</dt>
                        <dd class="mb-4 font-light text-base text-neutral-60 sm:mb-5">Rp. <span id="price_modal"></span>
                            /Pax</dd>
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
                    @auth
                        <button data-modal-hide="seeDetailModal" data-modal-toggle="order_booking_modal" onclick="document.getElementById('order_booking_modal').classList.remove('translate-y-6')"
                            class="text-white inline-flex items-center bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <i class="fa-solid fa-cart-shopping mr-2"></i>
                            Booking Now
                        </button>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}"
                            class="text-white inline-flex items-center bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <i class="fa-solid fa-cart-shopping mr-2"></i>
                            Booking Now
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
