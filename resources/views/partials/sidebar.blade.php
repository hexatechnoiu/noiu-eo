<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="fixed top-0 z-40 inline-flex items-center p-[5px] mt-2 ml-3 text-sm bg-primary-20 text-white hover:bg-white hover:text-primary-20 rounded-lg lg:hidden focus:outline-none focus:ring-2 focus:ring-primary-10">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 h-screen transition-transform -translate-x-full lg:translate-x-0" aria-label="Sidenav">
    <div class="overflow-y-auto py-5 px-3 h-full bg-primary-20">
        <ul class="space-y-2">
            <li>
                <a href="/" class="flex items-center p-2 pb-0">
                    <img src="{{ asset('img/logo-eo.svg') }}" class="h-12 mb-6 text-white"
                        alt="NOIU Logo" />
                    <button type="button" data-drawer-hide="default-sidebar" aria-controls="default-sidebar"
                        class="lg:hidden text-white bg-transparent hover:bg-secondary-40 hover:text-black rounded-lg text-sm py-4 px-2 my-auto absolute top-8 right-3 inline-flex items-center">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close menu</span>
                    </button>
                </a>
            </li>
            <li>
                <a href="/home"
                    class="{{ $active === 'home' ? 'bg-secondary-40 text-black group' : 'text-white' }} flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black duration-[400ms]">
                    <i class="fa-solid fa-house"></i>
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li>
                @if ($active === 'package')
                    <button type="button" id="dropdown-button-outbound"
                        class="{{ $active === 'package' ? 'bg-secondary-40 text-black group' : 'text-white' }} flex items-center p-2 w-full text-base font-normal rounded-lg"
                        aria-controls="dropdown-outbound" data-collapse-toggle="dropdown-outbound">
                        <i class="fa-solid fa-person-hiking fa-lg"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Outbound Package</span>
                        <i class="fas fa-chevron-down ml-3"></i>
                    </button>
                @else
                    <div
                        class="{{ $active === 'package' ? 'bg-secondary-40 text-black group' : 'text-white' }} flex items-center p-2 w-full text-base font-normal rounded-lg transition cursor-pointer hover:bg-secondary-40 hover:text-black duration-[400ms]">
                        <a href="/package">
                            <i class="fa-solid fa-person-hiking fa-lg"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Outbound Package</span>
                        </a>
                        <div id="dropdown-button-outbound">
                            <i class="fas fa-chevron-down ml-3" aria-controls="dropdown-outbound"
                                data-collapse-toggle="dropdown-outbound"></i>
                        </div>
                    </div>
                @endif

                <ul id="dropdown-outbound" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/package#outbound"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-white hover:text-black rounded-lg group hover:bg-secondary-40 duration-[400ms]">Outbound</a>
                    </li>
                    <li>
                        <a href="/package#offroad"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-white hover:text-black rounded-lg group hover:bg-secondary-40 duration-[400ms]">Offroad</a>
                    </li>
                    <li>
                        <a href="/package#rafting"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-white hover:text-black rounded-lg group hover:bg-secondary-40 duration-[400ms]">Rafting</a>
                    </li>
                    <li>
                        <a href="/package#others"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-white hover:text-black rounded-lg group hover:bg-secondary-40 duration-[400ms]">Others</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/mice"
                    class="{{ $active === 'mice' ? 'bg-secondary-40 text-black group' : 'text-white' }} flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black duration-[400ms]">
                    <i class="fa-solid fa-clipboard-list fa-lg"></i>
                    <span class="ml-3">Event Organizer</span>
                </a>
            </li>
            <li>
                <a href="/booking"
                    class="{{ $active === 'booking' ? 'bg-secondary-40 text-black group' : 'text-white' }} flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black group duration-[400ms]">
                    <i class="fa-solid fa-clipboard-check fa-lg"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Booking</span>
                    <span
                        class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full">
                        6
                    </span>
                </a>
            </li>
            <li>
                <a href="/contact"
                    class="{{ $active === 'contact' ? 'bg-secondary-40 text-black group' : 'text-white' }} flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black group duration-[400ms]">
                    <i class="fa-solid fa-phone"></i>
                    <span class="ml-3">Contact Us</span>
                </a>
            </li>
        </ul>
        @auth
            <ul class="pt-5 mt-5 space-y-2 border-t border-white">
                <li>
                    <a href="/dashboard"
                        class="{{ $active === 'dashboard' ? 'bg-secondary-40 text-black group' : 'text-white' }} flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black group duration-[400ms]">
                        <i class="fa-solid fa-gauge-high fa-lg"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
            </ul>
        @endauth
    </div>
    @auth
        <div class="absolute bottom-0 left-0 p-4 w-full whitespace-nowrap flex z-20 bg-primary-20 border-t border-white">
            <img src="{{ asset( '/storage/'. auth()->user()->avatar) }}" class="h-10 my-auto rounded-full"
                alt="Profile" />
            <ul class="my-auto">
                <li class="ml-3 text-white">{{ auth()->user()->name }}</li>
                <li class="ml-3 text-white text-xs">{{ auth()->user()->role }}</li>
            </ul>
            <form class="ml-auto" action="/logout" method="POST">
                @csrf
                <button type="submit" data-tooltip-target="tooltip-logout"
                    class="p-2 ml-9 text-base font-normal text-white rounded-lg hover:bg-secondary-40 hover:text-black group duration-[400ms]">
                    <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                </button>
            </form>
            <div id="tooltip-logout" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-black rounded-lg shadow-sm opacity-0 transition-opacity duration-[400ms] tooltip">
                Logout
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    @endauth
    @guest
        <div class="flex z-20 absolute justify-end bottom-0 left-0 py-4 w-full whitespace-nowrap bg-primary-20 border-t border-white">
            <a href="/login" class="py-2 px-20 mx-auto text-base font-medium text-black rounded-lg bg-secondary-40 hover:bg-secondary-50 group duration-[400ms]">
                <span class="mr-2">Login</span>
                <i class="fa-solid fa-arrow-right-to-bracket fa-lg"></i>
            </a>
        </div>
    @endguest
</aside>
