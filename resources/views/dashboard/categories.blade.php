@extends('layouts.main')

@section('container')
    
    <!-- Start block -->
    <section class="bg-white p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl text-center py-10 px-4 lg:px-6">
            <div class="flex items-start mb-8 max-w-screen-sm gap-[13vw] md:gap-[23vw]">
                <a href="/dashboard" class="text-sm font-medium py-1 px-2 sm:py-1.5 sm:px-3 rounded-lg tracking-tight text-black bg-Secondary-40 hover:text-white hover:bg-Primary-40 duration-[400ms]"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
                <h2 class="flex justify-center mb-2 text-2xl sm:text-4xl tracking-tight font-extrabold text-black">Categories</h2>
            </div>
            <!-- Start coding here -->
            <div class="bg-Neutral-10 max-w-sm relative shadow-2xl sm:rounded-lg overflow-hidden">
                <div class="w-full m-4 md:w-auto items-stretch md:items-center justify-start">
                    <button type="button" id="createCategoryModalButton" data-modal-target="createCategoryModal" data-modal-toggle="createCategoryModal" class="flex items-center justify-center text-white bg-Primary-40 hover:text-black hover:bg-Secondary-40 focus:ring-4 focus:ring-Primary-10 duration-[400ms] font-medium rounded-lg text-sm px-4 py-2">
                        <i class="fa-solid fa-plus mr-2"></i>
                        <span>Add New Category</span>
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-Neutral-60">
                        <thead class="text-xs text-Neutral-60 uppercase bg-Neutral-10">
                            <tr>
                                <th scope="col" class="px-4 py-4">Category Name</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <tr class="border-b">
                                    <td class="px-4 py-3 max-w-[10rem]">Outbound</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="category-dropdown-button" data-dropdown-toggle="category-dropdown" class="inline-flex items-center font-medium hover:bg-Neutral-20 py-3.5 px-2 text-center text-Neutral-60 hover:text-black duration-[400ms] rounded-lg focus:ring-2 focus:ring-Primary-10 focus:border-Primary-10" type="button">
                                            <i class="fa-solid fa-ellipsis fa-lg"></i>
                                        </button>
                                        <div id="category-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-Neutral-20 shadow">
                                            <ul class="py-1 text-sm" aria-labelledby="category-dropdown-button">
                                                <li>
                                                    <button type="button" data-modal-target="updateCategoryModal" data-modal-toggle="updateCategoryModal" class="flex w-full items-center py-2 px-4 hover:bg-Neutral-20 duration-[400ms] text-Neutral-60">
                                                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                        <span>Edit</span>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-modal-target="readCategoryModal" data-modal-toggle="readCategoryModal" class="flex w-full items-center py-2 px-4 hover:bg-Neutral-20 duration-[400ms] text-Neutral-60">
                                                        <i class="fa-solid fa-eye mr-2"></i>
                                                        Preview
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="flex w-full items-center py-2 px-4 hover:bg-Neutral-20 duration-[400ms] text-red-500">
                                                        <i class="fa-solid fa-trash-can mr-2"></i>
                                                        Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->

    <!-- Create modal -->
    <div id="createCategoryModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Add Category</h3>
                    <button type="button" class="text-Neutral-60 bg-transparent hover:bg-Neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center" data-modal-target="createCategoryModal" data-modal-toggle="createCategoryModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form action="#">
                    <div class="mb-4">
                        <div>
                            <label for="categoryName" class="block mb-2 text-sm font-medium text-black">Category Name</label>
                            <input type="text" name="categoryName" id="categoryName" class="bg-Neutral-10 border border-Neutral-30 text-black text-sm rounded-lg focus:ring-Primary-20 focus:border-Primary-40 block w-full p-2.5" placeholder="Category Name" required="">
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center text-white bg-Primary-40 hover:text-black hover:bg-Secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-Secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="fa fa-plus mr-2"></i>
                        Add New Category
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Update modal -->
    <div id="updateCategoryModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-2xl font-semibold text-black">Update Category</h3>
                    <button type="button" class="text-Neutral-60 bg-transparent hover:bg-Neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center" data-modal-target="updateCategoryModal" data-modal-toggle="updateCategoryModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form action="#">
                    <div class="mb-4">
                        <div>
                            <label for="categoryName" class="block mb-2 text-sm font-medium text-black">Category Name</label>
                            <input type="text" name="categoryName" id="categoryName" value="Outbound" class="bg-Neutral-10 border border-Neutral-30 text-black text-sm rounded-lg focus:ring-Primary-20 focus:border-Primary-40 block w-full p-2.5" placeholder="Category Name" required="">
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit" class="text-white bg-Primary-40 hover:text-black hover:bg-Secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-Secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Update Category
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
    <div id="readCategoryModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-end">
                    <button type="button" class="text-Neutral-60 bg-transparent hover:bg-Neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 inline-flex" data-modal-toggle="readCategoryModal">
                        <i class="fa-solid fa-xmark fa-xl"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div>
                    <h3 class="mb-6 text-2xl text-black font-semibold">Outbound</h3>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button" class="text-white inline-flex items-center bg-Primary-40 hover:text-black hover:bg-Secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-Primary-10 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>
                            Edit
                        </button>
                        <button type="button" class="py-2.5 px-5 text-sm font-medium text-black focus:outline-none bg-white rounded-lg border border-Neutral-30 hover:bg-Neutral-20 hover:text-Primary-40 duration-[400ms] focus:z-10 focus:ring-4 focus:ring-Primary-10">Preview</button>
                    </div>
                    <button type="button" class="inline-flex items-center text-white bg-red-600 hover:bg-red-800 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <i class="fa-solid fa-trash-can mr-2"></i>
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete modal -->
    <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                <button type="button" class="text-Neutral-60 absolute top-2.5 right-2.5 bg-transparent hover:bg-Neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center" data-modal-toggle="deleteModal">
                    <i class="fa-solid fa-xmark fa-xl"></i>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="text-Neutral-60 w-11 h-11 my-3.5 mx-auto">
                    <i class="fa-solid fa-trash-can fa-2xl"></i>
                </div>
                <p class="mb-4 text-Neutral-60">Are you sure you want to delete this category?</p>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-Neutral-60 bg-white rounded-lg border border-Neutral-30 hover:bg-Neutral-20 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-Primary-10 hover:text-black focus:z-10">No, cancel</button>
                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-red-300">Yes, I'm sure</button>
                </div>
            </div>
        </div>
    </div>

@endsection