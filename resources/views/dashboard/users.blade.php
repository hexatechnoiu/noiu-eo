@extends('layouts.dashboardmain')

@section('container')

    <!-- Start block -->
    <section class="bg-white p-3 sm:p-5 antialiased">
        <div class="mx-auto py-10 px-4 lg:px-6">
            <div class="flex items-start mb-8 max-w-screen-sm gap-[20vw] md:gap-[27vw]">
                <a href="/dashboard" class="text-sm font-medium py-1 px-2 sm:py-1.5 sm:px-3 rounded-lg tracking-tight hover:text-white hover:bg-primary-40 text-black bg-neutral-20 focus:ring-4 focus:ring-primary-10 duration-[400ms]"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
                <h2 class="flex justify-center mb-2 text-2xl sm:text-4xl tracking-tight font-extrabold text-black">Users</h2>
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
                                <input type="text" id="simple-search" class="bg-white border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-ring-primary-40 block w-full pl-10 p-2" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" id="createUserModalButton" data-modal-target="createUserModal" data-modal-toggle="createUserModal" class="flex items-center justify-center text-white bg-primary-40 hover:text-black hover:bg-secondary-40 focus:ring-4 focus:ring-secondary-20 duration-[400ms] font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <i class="fa-solid fa-plus mr-2"></i>
                            <span>Add New User</span>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-neutral-60">
                        <thead class="text-base text-neutral-60 uppercase bg-neutral-10">
                            <tr>
                                <th scope="col" class="px-4 py-4">Profile Picture</th>
                                <th scope="col" class="px-4 py-3">Full Name</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Phone</th>
                                <th scope="col" class="px-4 py-3">Address</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                            <tr class="border-b">
                                <td class="w-1 px-4 py-3"><img src="{{ asset('/storage/'. $u->avatar)  }}"></td>
                                <td class="px-4 py-3">{{ $u->name }}</td>
                                <td class="px-4 py-3">{{ $u->email }}</td>
                                <td class="px-4 py-3">{{ $u->phone }}</td>
                                <td class="px-4 py-3 max-w-[12rem] truncate">{{ $u->address }}</td>
                                <td class="px-4 py-3 my-6 flex items-center justify-end">
                                    <button id="user-dropdown-button" data-dropdown-toggle="user-dropdown" class="inline-flex items-center font-medium hover:bg-neutral-20 py-3.5 px-2 text-center text-neutral-60 hover:text-black duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 focus:border-primary-10" type="button">
                                        <i class="fa-solid fa-ellipsis fa-lg"></i>
                                    </button>
                                    <div id="user-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-neutral-20 shadow">
                                        <ul class="py-1 text-sm" aria-labelledby="user-dropdown-button">
                                            <li>
                                                <button type="button" data-modal-target="updateUserModal" data-modal-toggle="updateUserModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                    <span>Edit</span>
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" data-modal-target="readUserModal" data-modal-toggle="readUserModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                    <i class="fa-solid fa-eye mr-2"></i>
                                                    Preview
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-red-500">
                                                    <i class="fa-solid fa-trash-can mr-2"></i>
                                                    Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            {{-- <tr class="border-b">
                                <td class="w-1 px-4 py-3"><img src="{{ asset('img/team/hafiz.jpg') }}" alt=""></td>
                                <td class="px-4 py-3">Hafiz Haekal</td>
                                <td class="px-4 py-3">hafizhaekal03@gmail.com</td>
                                <td class="px-4 py-3">087894818815</td>
                                <td class="px-4 py-3 max-w-[12rem] truncate">Jl.Tanjung Manunggal V No.30 RT04 RW03 Desa Sukatali, Kec.Situraja, Kab.Sumedang, Jawa Barat, 45371</td>
                                <td class="px-4 py-3 my-6 flex items-center justify-end">
                                    <button id="user-dropdown-button" data-dropdown-toggle="user-dropdown" class="inline-flex items-center font-medium hover:bg-neutral-20 py-3.5 px-2 text-center text-neutral-60 hover:text-black duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 focus:border-primary-10" type="button">
                                        <i class="fa-solid fa-ellipsis fa-lg"></i>
                                    </button>
                                    <div id="user-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-neutral-20 shadow">
                                        <ul class="py-1 text-sm" aria-labelledby="user-dropdown-button">
                                            <li>
                                                <button type="button" data-modal-target="updateUserModal" data-modal-toggle="updateUserModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                    <span>Edit</span>
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" data-modal-target="readUserModal" data-modal-toggle="readUserModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                    <i class="fa-solid fa-eye mr-2"></i>
                                                    Preview
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-red-500">
                                                    <i class="fa-solid fa-trash-can mr-2"></i>
                                                    Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="w-1 px-4 py-3"><img src="{{ asset('img/team/azfa.jpg') }}" alt=""></td>
                                <td class="px-4 py-3">Muhammad Azfa</td>
                                <td class="px-4 py-3">azfasa15@gmail.com</td>
                                <td class="px-4 py-3">085156105763</td>
                                <td class="px-4 py-3 max-w-[12rem] truncate">Jl.Tanjung Manunggal V No.30 RT04 RW03 Desa Sukatali, Kec.Situraja, Kab.Sumedang, Jawa Barat, 45371</td>
                                <td class="px-4 py-3 my-6 flex items-center justify-end">
                                    <button id="user-dropdown-button" data-dropdown-toggle="user-dropdown" class="inline-flex items-center font-medium hover:bg-neutral-20 py-3.5 px-2 text-center text-neutral-60 hover:text-black duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 focus:border-primary-10" type="button">
                                        <i class="fa-solid fa-ellipsis fa-lg"></i>
                                    </button>
                                    <div id="user-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-neutral-20 shadow">
                                        <ul class="py-1 text-sm" aria-labelledby="user-dropdown-button">
                                            <li>
                                                <button type="button" data-modal-target="updateUserModal" data-modal-toggle="updateUserModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                    <span>Edit</span>
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" data-modal-target="readUserModal" data-modal-toggle="readUserModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                    <i class="fa-solid fa-eye mr-2"></i>
                                                    Preview
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-red-500">
                                                    <i class="fa-solid fa-trash-can mr-2"></i>
                                                    Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="w-1 px-4 py-3"><img src="{{ asset('img/team/ghazy.jpg') }}" alt=""></td>
                                <td class="px-4 py-3">M Ghazy</td>
                                <td class="px-4 py-3">xylviet@gmail.com</td>
                                <td class="px-4 py-3">085158266733</td>
                                <td class="px-4 py-3 max-w-[12rem] truncate">Jl.Tanjung Manunggal V No.30 RT04 RW03 Desa Sukatali, Kec.Situraja, Kab.Sumedang, Jawa Barat, 45371</td>
                                <td class="px-4 py-3 my-6 flex items-center justify-end">
                                    <button id="user-dropdown-button" data-dropdown-toggle="user-dropdown" class="inline-flex items-center font-medium hover:bg-neutral-20 py-3.5 px-2 text-center text-neutral-60 hover:text-black duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 focus:border-primary-10" type="button">
                                        <i class="fa-solid fa-ellipsis fa-lg"></i>
                                    </button>
                                    <div id="user-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-neutral-20 shadow">
                                        <ul class="py-1 text-sm" aria-labelledby="user-dropdown-button">
                                            <li>
                                                <button type="button" data-modal-target="updateUserModal" data-modal-toggle="updateUserModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                    <span>Edit</span>
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" data-modal-target="readUserModal" data-modal-toggle="readUserModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                    <i class="fa-solid fa-eye mr-2"></i>
                                                    Preview
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-red-500">
                                                    <i class="fa-solid fa-trash-can mr-2"></i>
                                                    Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-neutral-60">
                        Showing
                        <span class="font-semibold text-black">1-10</span>
                        of
                        <span class="font-semibold text-black">1000</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-neutral-60 bg-white rounded-l-lg border border-neutral-30 hover:bg-neutral-20 hover:text-black">
                                <span class="sr-only">Previous</span>
                                <i class="fa-solid fa-chevron-left fa-sm"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">1</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">3</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">...</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-neutral-60 bg-white border border-neutral-30 hover:bg-neutral-20 hover:text-black">100</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-neutral-60 bg-white rounded-r-lg border border-neutral-30 hover:bg-neutral-20 hover:text-black">
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
    <div id="createUserModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Add User</h3>
                    <button type="button" class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center" data-modal-target="createUserModal" data-modal-toggle="createUserModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="#">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="image" class="block mb-2 text-sm font-medium text-black">Profil Picture</label>
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full cursor-pointer">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-black">Full Name</label>
                            <input type="text" name="name" id="name" class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="Your Name" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                            <input type="text" name="email" id="email" class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="hexatechnoiu@gmail.com" required="">
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-black">Phone</label>
                            <input type="text" name="phone" id="phone" class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="Your Phone" required="">
                        </div>
                        <div class="sm:col-span-2"><label for="address" class="block mb-2 text-sm font-medium text-black">Address</label><textarea id="address" rows="4" class="block p-2.5 w-full text-sm text-black bg-neutral-10 rounded-lg border border-neutral-30 focus:ring-primary-20 focus:border-primary-40" placeholder="Your Address"></textarea></div>
                    </div>
                    <button type="submit" class="inline-flex items-center text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="fa-solid fa-plus mr-2"></i>
                        Add New User
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Update modal -->
    <div id="updateUserModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Update User</h3>
                    <button type="button" class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center" data-modal-toggle="updateUserModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="#">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="image" class="block mb-2 text-sm font-medium text-black">Profil Picture</label>
                            <input type="file" id="image" name="image" value=".jpg" class="form-control @error('image') is-invalid @enderror bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full cursor-pointer">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-black">Full Name</label>
                            <input type="text" name="name" id="name" value="Hafiz Haekal" class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="Your Name" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                            <input type="text" name="email" id="email" value="hafizhaekal03@gmail.com" class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="hexatechnoiu@gmail.com" required="">
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-black">Phone</label>
                            <input type="text" name="phone" id="phone" value="087894818815" class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5" placeholder="Your Phone" required="">
                        </div>
                        <div class="sm:col-span-2"><label for="address" class="block mb-2 text-sm font-medium text-black">Address</label><textarea id="address" rows="5" class="block p-2.5 w-full text-sm text-black bg-neutral-10 rounded-lg border border-neutral-30 focus:ring-primary-20 focus:border-primary-40" placeholder="Your Address">Jl.Tanjung Manunggal V No.30 RT04 RW03 Desa Sukatali, Kec.Situraja, Kab.Sumedang, Jawa Barat, 45371</textarea></div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit" class="text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Update User
                        </button>
                        <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <i class="fa-solid fa-trash-can mr-2"></i>
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Read modal -->
    <div id="readUserModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full justify-center" src="{{ asset('img/team/hafiz.jpg') }}" alt="Hafiz Haekal">
                    <div>
                        <button type="button" class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 inline-flex" data-modal-toggle="readUserModal">
                            <i class="fa-solid fa-xmark fa-xl"></i>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
                <div>
                    <h3 class="mb-6 text-2xl text-black font-semibold">Hafiz Haekal</h3>
                    <dt class="mt-2 font-semibold leading-none text-black">Email</dt><dd class="mb-4 font-light text-base text-neutral-60 sm:mb-5">hafizhaekal03@gmail.com</dd></dl>
                    <dt class="mt-2 font-semibold leading-none text-black">Phone</dt><dd class="mb-4 font-light text-base text-neutral-60 sm:mb-5">087894818815</dd></dl>
                    <dl><dt class="mt-2 font-semibold leading-none text-black">Address</dt><dd class="mb-4 font-light text-neutral-60 sm:mb-5">Jl.Tanjung Manunggal V No.30 RT04 RW03 Desa Sukatali, Kec.Situraja, Kab.Sumedang, Jawa Barat, 45371</dd>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete modal -->
    <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                <button type="button" class="text-neutral-60 absolute top-2.5 right-2.5 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center" data-modal-toggle="deleteModal">
                    <i class="fa-solid fa-xmark fa-xl"></i>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="text-neutral-60 w-11 h-11 my-3.5 mx-auto">
                    <i class="fa-solid fa-trash-can fa-2xl"></i>
                </div>
                <p class="mb-4 text-neutral-60">Are you sure you want to delete this user?</p>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-neutral-60 bg-white rounded-lg border border-neutral-30 hover:bg-neutral-20 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 hover:text-black focus:z-10">No, cancel</button>
                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-red-300">Yes, I'm sure</button>
                </div>
            </div>
        </div>
    </div>

@endsection
