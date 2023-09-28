<!-- Create modal -->
<div id="order_booking_modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-2xl font-semibold text-black">Booking</h3>
                <button type="button"
                    class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center"
                    data-modal-target="order_booking_modal" data-modal-toggle="order_booking_modal">
                    <i class="fa-solid fa-xmark fa-xl"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form id="booking_form" action="/booking" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                <input type="hidden" value="{{ old('package_id') }}" name="package_id" id="package_id">
                <h3 class="text-lg font-semibold text-black mb-4">Data Customer :</h3>
                <div class="grid gap-4 mb-4 sm:grid-cols-3">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-black">Full Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-neutral-10 border border-primary-40 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                            placeholder="Your Name" required @auth value="{{ auth()->user()->name }}" @endauth>
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-black">Phone Number</label>
                        <input type="text" name="phone" id="phone"
                            class="bg-neutral-10 border border-primary-40 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                            placeholder="081234512345" required @auth
                            value="{{ auth()->user()->phone }}" @endauth>
                    </div>
                    <div>
                        <label for="payment" class="block mb-2 text-sm font-medium text-black">Payment Method</label>
                        <select id="payment" name="payment_method"
                            class="bg-neutral-10 border border-primary-40 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5">
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
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="packageName" class="block mb-2 text-sm font-medium text-black">
                          Package Name
                        </label>
                        <input type="text" name="packageName" id="packageName"
                            class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                            placeholder="Package Name" required disabled value="{{ $selected_booking->name ?? '' }}">
                    </div>

                    <div>
                        <label for="booking_category" class="block mb-2 text-sm font-medium text-black">Category</label>
                        <select disabled id="booking_category"
                            class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5">
                            <option>Select Category</option>
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
                            class="bg-neutral-10 border border-primary-40 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                            placeholder="01/01/2024" required>
                    </div>
                    <div>
                        <label for="booking_price" class="block mb-2 text-sm font-medium text-black">Price</label>
                        <input type="text" name="price" id="booking_price"
                            class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                            placeholder="Rp. 250.000" required
                            value="Rp. {{ number_format($selected_booking->price ?? 0, 0, ',', '.') }}" disabled>
                    </div>
                </div>
                <div class="flex justify-end items-center">
                    <button type="submit"
                        class="inline-flex items-center text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 mt-2 text-center">
                        Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
