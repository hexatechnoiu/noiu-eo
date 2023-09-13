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
                    <img src="<?php echo e(asset('img/logo-eo.svg')); ?>" class="h-12 mb-6 text-white"
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
                    class="<?php echo e($active === 'home' ? 'bg-secondary-40 text-black group' : 'text-white'); ?> flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black duration-[400ms]">
                    <i class="fa-solid fa-house"></i>
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li>
                <?php if($active === 'outbound'): ?>
                    <button type="button" id="dropdown-button-outbound"
                        class="<?php echo e($active === 'outbound' ? 'bg-secondary-40 text-black group' : 'text-white'); ?> flex items-center p-2 w-full text-base font-normal rounded-lg"
                        aria-controls="dropdown-outbound" data-collapse-toggle="dropdown-outbound">
                        <i class="fa-solid fa-person-hiking fa-lg"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Outbound Package</span>
                        <i class="fas fa-chevron-down ml-3"></i>
                    </button>
                <?php else: ?>
                    <div
                        class="<?php echo e($active === 'outbound' ? 'bg-secondary-40 text-black group' : 'text-white'); ?> flex items-center p-2 w-full text-base font-normal rounded-lg transition cursor-pointer hover:bg-secondary-40 hover:text-black duration-[400ms]">
                        <a href="/outbound">
                            <i class="fa-solid fa-person-hiking fa-lg"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Outbound Package</span>
                        </a>
                        <div id="dropdown-button-outbound">
                            <i class="fas fa-chevron-down ml-3" aria-controls="dropdown-outbound"
                                data-collapse-toggle="dropdown-outbound"></i>
                        </div>
                    </div>
                <?php endif; ?>

                <ul id="dropdown-outbound" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#outbound"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-white hover:text-black rounded-lg group hover:bg-secondary-40 duration-[400ms]">Outbound</a>
                    </li>
                    <li>
                        <a href="#offroad"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-white hover:text-black rounded-lg group hover:bg-secondary-40 duration-[400ms]">Offroad</a>
                    </li>
                    <li>
                        <a href="#rafting"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-white hover:text-black rounded-lg group hover:bg-secondary-40 duration-[400ms]">Rafting</a>
                    </li>
                    <li>
                        <a href="#others"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-white hover:text-black rounded-lg group hover:bg-secondary-40 duration-[400ms]">Others</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/mice"
                    class="<?php echo e($active === 'mice' ? 'bg-secondary-40 text-black group' : 'text-white'); ?> flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black duration-[400ms]">
                    <i class="fa-solid fa-clipboard-list fa-lg"></i>
                    <span class="ml-3">Event Organizer</span>
                </a>
            </li>
            <li>
                <a href="/booking"
                    class="<?php echo e($active === 'booking' ? 'bg-secondary-40 text-black group' : 'text-white'); ?> flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black group duration-[400ms]">
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
                    class="<?php echo e($active === 'contact' ? 'bg-secondary-40 text-black group' : 'text-white'); ?> flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black group duration-[400ms]">
                    <i class="fa-solid fa-phone"></i>
                    <span class="ml-3">Contact Us</span>
                </a>
            </li>
        </ul>
        <?php if(auth()->guard()->check()): ?>
            <ul class="pt-5 mt-5 space-y-2 border-t border-white">
                <li>
                    <a href="/dashboard"
                        class="<?php echo e($active === 'dashboard' ? 'bg-secondary-40 text-black group' : 'text-white'); ?> flex items-center p-2 py-auto text-base font-normal rounded-lg hover:bg-secondary-40 hover:text-black group duration-[400ms]">
                        <i class="fa-solid fa-gauge-high fa-lg"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
    <?php if(auth()->guard()->check()): ?>
        <div class="absolute bottom-0 left-0 p-4 w-full whitespace-nowrap flex z-20 bg-primary-20 border-t border-white">
            <img src="<?php echo e(asset( '/storage/'. auth()->user()->avatar)); ?>" class="h-10 my-auto rounded-full"
                alt="Profile" />
            <ul class="my-auto">
                <li class="ml-3 text-white max-w-[8rem] truncate"><?php echo e(auth()->user()->name); ?></li>
                <li class="ml-3 text-white text-xs"><?php echo e(auth()->user()->role); ?></li>
            </ul>
            <button type="button" data-tooltip-target="tooltip-logout" data-modal-target="logoutModal" data-modal-toggle="logoutModal" class="p-2 ml-9 text-base font-normal text-white rounded-lg hover:bg-secondary-40 hover:text-black group duration-[400ms]">
                <i class="fa-solid fa-right-from-bracket fa-lg"></i>
            </button>
            <div id="tooltip-logout" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-black rounded-lg shadow-sm opacity-0 transition-opacity duration-[400ms] tooltip">
                Logout
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
        <div class="flex z-20 absolute justify-end bottom-0 left-0 py-4 w-full whitespace-nowrap bg-primary-20 border-t border-white">
            <a href="/login" class="py-2 px-20 mx-auto text-base font-medium text-black rounded-lg bg-secondary-40 hover:bg-secondary-50 group duration-[400ms]">
                <span class="mr-2">Login</span>
                <i class="fa-solid fa-arrow-right-to-bracket fa-lg"></i>
            </a>
        </div>
    <?php endif; ?>
</aside>


<div id="logoutModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
            <button type="button" class="text-neutral-60 absolute top-2.5 right-2.5 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center" data-modal-toggle="logoutModal">
                <i class="fa-solid fa-xmark fa-xl"></i>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="text-neutral-60 w-11 h-11 mt-3.5 mb-6 mx-auto">
                <i class="fa-solid fa-person-walking-arrow-right text-4xl"></i>
            </div>
            <p class="mb-4 text-neutral-60">Are you sure you want to Logout?</p>
            <div class="flex justify-center items-center">
                <form action="/logout" method="POST">
                    <?php echo csrf_field(); ?>
                    <button data-modal-toggle="logoutModal" type="button" class="py-2 px-3 mr-4 text-sm font-medium text-neutral-60 bg-white rounded-lg border border-neutral-30 hover:bg-neutral-20 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 hover:text-black focus:z-10">No, cancel</button>
                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-primary-40 rounded-lg hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10">Yes, I'm sure</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Praktik Kerja Lapangan (PKL)\noiu-eo\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>