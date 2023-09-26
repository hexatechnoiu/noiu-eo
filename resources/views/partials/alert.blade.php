@if (session()->has('inbox'))
    <div class="flex justify-center">
      {{-- lg:mr-[635px] --}}
        <div id="alert-3"
            class="flex flex-row items-center px-4 py-3 mb-4 mt-10 mr-5 text-primary-40 bg-primary-10 fixed animate-fade-in"
            role="alert">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-check"></i>
                <span class="sr-only">Info</span>
                <div class="ml-4 mr-2 text-sm font-medium">
                    {{ session('inbox') }}
                </div>
            </div>
            <button type="button"
                class="text-primary-40 hover:bg-blue-400 duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 p-1.5 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="w-full h-1 bg-gray-300 mt-2 absolute bottom-0 left-0">
                <div id="time-bar" class="h-1 bg-primary-40" style="width: 100%;"></div>
            </div>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="flex justify-end">
        <div id="alert-3"
            class="flex flex-row items-center px-4 py-3 mb-4 mt-5 mr-5 text-green-800 bg-green-100 fixed z-50"
            role="alert">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-check"></i>
                <span class="sr-only">Info</span>
                <div class="ml-4 mr-2 text-sm font-medium">
                    {{ session('success') }}
                </div>
            </div>
            <button type="button"
                class="text-green-500 hover:bg-green-200 duration-[400ms] rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#alert-3" aria-label="Close">
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
    <div class="flex justify-end">
        <div id="alert-3"
            class="flex flex-row items-center px-4 py-3 mb-4 mt-5 mr-5 text-red-700 bg-red-200 fixed z-50"
            role="alert">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-xmark"></i>
                <span class="sr-only">Info</span>
                <div class="ml-4 mr-2 text-sm font-medium">
                    {{ $e }}
                </div>
            </div>
            <button type="button"
                class="text-red-700 hover:bg-red-300 duration-[400ms] rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="w-full h-1 bg-gray-300 mt-2 absolute bottom-0 left-0">
                <div id="time-bar" class="h-1 bg-red-700" style="width: 100%;"></div>
            </div>
        </div>
    </div>
@endforeach
