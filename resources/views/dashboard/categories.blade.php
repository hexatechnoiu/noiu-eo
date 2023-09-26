@extends('layouts.dashboardmain')

@section('container')

    <!-- Start block -->
    <section class="bg-white p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl text-center py-10 px-4 lg:px-6">
            <div class="flex items-start mb-8 max-w-screen-sm gap-[13vw] md:gap-[23vw]">
              <a href="/dashboard" class="text-sm font-medium py-1 px-2 sm:py-1.5 sm:px-3 rounded-lg tracking-tight hover:text-white hover:bg-primary-40 text-black bg-neutral-20 focus:ring-4 focus:ring-primary-10 duration-[400ms]"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
                <h2 class="flex justify-center mb-2 text-2xl sm:text-4xl tracking-tight font-extrabold text-black">Categories</h2>
            </div>
            <!-- Start coding here -->
            <div class="bg-neutral-10 max-w-sm relative shadow-2xl sm:rounded-lg overflow-hidden">
                <div class="w-full m-4 md:w-auto items-stretch md:items-center justify-start">
                    <button type="button" id="createCategoryModalButton" data-modal-target="createCategoryModal"
                        data-modal-toggle="createCategoryModal"
                        class="flex items-center justify-center text-white bg-primary-40 hover:text-black hover:bg-secondary-40 focus:ring-4 focus:ring-secondary-20 duration-[400ms] font-medium rounded-lg text-sm px-4 py-2">
                        <i class="fa-solid fa-plus mr-2"></i>
                        <span>Add New Category</span>
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-neutral-60">
                        <thead class="text-xs text-neutral-60 uppercase bg-neutral-10">
                            <tr>
                                <th scope="col" class="px-4 py-4">Category Name</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                                @foreach ($cat->package_types as $type)
                                    <tr class="border-b">
                                        <td class="px-4 py-3 max-w-[10rem]">{{ $type->name }}</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button id="category-dropdown-button" data-dropdown-toggle="category-dropdown"
                                            onclick="copyData(`{{ $type->id }}`, `{{ $type->name}}`, `{{ $type->package_category->id}}`)"
                                                class="inline-flex items-center font-medium hover:bg-neutral-20 py-3.5 px-2 text-center text-neutral-60 hover:text-black duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 focus:border-primary-10"
                                                type="button">
                                                <i class="fa-solid fa-ellipsis fa-lg"></i>
                                            </button>
                                            <div id="category-dropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-neutral-20 shadow">
                                                <ul class="py-1 text-sm" aria-labelledby="category-dropdown-button">
                                                    <li>
                                                        <button type="button" data-modal-target="updateCategoryModal"
                                                            data-modal-toggle="updateCategoryModal"
                                                            class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                            <span>Edit</span>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->

    <!-- Create modal -->
    <div id="createCategoryModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Add Category</h3>
                    <button type="button"
                        class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center"
                        data-modal-target="createCategoryModal" data-modal-toggle="createCategoryModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form action="/dashboard/categories" method="POST" id="update_modal">
                    @method('POST')
                    @csrf
                    <div class="mb-4">
                        <div>
                            <label for="create_categoryName" class="block mb-2 text-sm font-medium text-black">Category
                                Name</label>
                            <input type="text" name="name" id="create_categoryName"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Category Name" required="">
                        </div>
                    </div>
                    <div class="mb-4">
                        <div>
                            <label for="create_category" class="block mb-2 text-sm font-medium text-black">Page
                                Name</label>
                                <select id="create_category" name="package_category_id"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5">
                                <option>Select Page To view</option>
                                @foreach ($categories as $pt)
                                    <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                        class="inline-flex items-center text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Add Category
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Update modal -->
    <div id="updateCategoryModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Update Category</h3>
                    <button type="button"
                        class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center"
                        data-modal-target="updateCategoryModal" data-modal-toggle="updateCategoryModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form id="update_form" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <div>
                            <label for="update_categoryName" class="block mb-2 text-sm font-medium text-black">Category
                                Name</label>
                            <input type="text" name="name" id="update_categoryName"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5"
                                placeholder="Category Name">
                        </div>
                    </div>
                    <div class="mb-4">
                        <div>
                            <label for="update_category" class="block mb-2 text-sm font-medium text-black">Which Page?</label>
                            <select id="update_category" name="package_category_id"
                                class="bg-neutral-10 border border-neutral-30 text-black text-sm rounded-lg focus:ring-primary-20 focus:border-primary-40 block w-full p-2.5">
                                <option>Select Category</option>
                                @foreach ($categories as $pt)
                                    <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button type="submit"
                            class="text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Read modal -->
    <div id="readCategoryModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-end">
                    <button type="button"
                        class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 inline-flex"
                        data-modal-toggle="readCategoryModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div>
                    <h3 class="mb-6 text-2xl text-black font-semibold">Outbound</h3>
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
                <p class="mb-4 text-neutral-60">Are you sure you want to delete this category?<span id="delete_categoryName"></span></p>

                <form method="POST" class="flex justify-center items-center space-x-4" id="delete_form">
                    @csrf
                    @method('DELETE')

                    <button data-modal-toggle="deleteModal" type="button"
                        class="py-2 px-3 text-sm font-medium text-neutral-60 bg-white rounded-lg border border-neutral-30 hover:bg-neutral-20 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-primary-10 hover:text-black focus:z-10">No,
                        cancel</button>
                    <button type="submit"
                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-red-300">Yes,
                        I'm sure</button>
                </form>

            </div>
        </div>
    </div>
@endsection
