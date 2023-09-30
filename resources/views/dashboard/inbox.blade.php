@extends('layouts.dashboardmain')

@section('container')
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
        <script type="text/javascript" src="/js/trix.js"></script>
    <!-- Start block -->
    <section class="bg-white p-3 sm:p-5 antialiased">
      <div class="mx-auto max-w-screen-xl text-center pt-10 pb-20 px-4 lg:px-6">
        <div class="flex items-start mb-8 max-w-screen-sm gap-[15vw] md:gap-[25vw]">
          <a href="/dashboard" class="text-sm font-medium py-1 px-2 sm:py-1.5 sm:px-3 rounded-lg tracking-tight hover:text-white hover:bg-primary-40 text-black bg-neutral-20 focus:ring-4 focus:ring-primary-10 duration-[400ms]"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
          <h2 class="flex justify-center mb-2 text-2xl sm:text-4xl tracking-tight font-extrabold text-black">Message</h2>
        </div>

          <!-- Start coding here -->
          <div class="bg-neutral-10 relative shadow-2xl sm:rounded-lg overflow-hidden max-w-full">
              <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left text-neutral-60">
                      <thead class="text-xs text-neutral-60 uppercase bg-neutral-10">
                          <tr>
                              <th scope="col" class="px-4 py-4">Full Name</th>
                              <th scope="col" class="px-4 py-3">Email</th>
                              <th scope="col" class="px-4 py-3">Message</th>
                              <th scope="col" class="px-4 py-3">
                                  <span class="sr-only">Actions</span>
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($inbox as $ibx)
                              <tr class="border-b">
                                  <td class="px-4 py-3">{{ $ibx->name }}</td>
                                  <td class="px-4 py-3">{{ $ibx->email }}</td>
                                  <td class="px-4 py-3">{{ $ibx->message }}</td>

                                  <td class="px-4 py-3">
                                      <button type="button" id="replyModalButton" data-modal-target="replyModal"
                                          data-modal-toggle="replyModal"
                                          onclick="inbox_copy({{ $ibx->id }})"
                                          class="flex justify-center text-primary-40 bg-transparent hover:text-white hover:bg-primary-40 border-[3px] border-primary-10 duration-[400ms] font-medium rounded-lg text-sm px-4 py-2">
                                          <div class="flex items-center">
                                              <i class="fa-solid fa-paper-plane mr-2"></i>
                                              <span>Reply</span>
                                          </div>
                                      </button>
                                      {{-- <button id="ibxing-dropdown-button{{ $ibx->id }}"
                                          onclick="ibxing_detail({{ $ibx->id }})"
                                          data-dropdown-toggle="ibxing-dropdown"
                                          class="inline-flex items-center font-medium hover:bg-neutral-20 py-3.5 px-2 text-center text-neutral-60 hover:text-black duration-[400ms] rounded-lg focus:ring-2 focus:ring-primary-10 focus:border-primary-10"
                                          data-name="{{ $ibx->name }}" data-phone="{{ $ibx->phone }}"
                                          data-payment-method="{{ $ibx->payment_method }}"
                                          data-package-name="{{ $ibx->package->name }}"
                                          data-package-price="{{ $ibx->package->price }}"
                                          data-package-category="{{ $ibx->package->package_type->name }}"
                                          data-date="{{ $ibx->date }}" type="button">
                                          <i class="fa-solid fa-ellipsis fa-lg"></i>
                                      </button> --}}
                                      {{-- <div id="inbox-dropdown"
                                          class="hidden z-10 w-44 bg-white rounded divide-y divide-neutral-20 shadow">
                                          <ul class="py-1 text-sm" aria-labelledby="inbox-dropdown-button">
                                              <li>
                                                  <button disabled type="button" data-modal-target="updateinboxModal"
                                                      data-modal-toggle="updateinboxModal"
                                                      class="flex w-full items-center py-2 px-4 hover:bg-neutral-20 duration-[400ms] text-neutral-60">
                                                      <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                      <span>Edit</span>
                                                  </button>
                                              </li>
                                              <li>
                                                  <button type="button" data-modal-target="readinboxModal"
                                                      data-modal-toggle="readinboxModal"
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
                                      </div> --}}
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              @if ($inbox->lastItem() < 2)
              @else
                  <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                      aria-label="Table navigation">
                      <span class="text-sm font-normal text-neutral-60">
                          Showing
                          <span class="font-semibold text-black">
                              {{ $inbox->firstItem() }}-{{ $inbox->lastItem() }}
                          </span>
                          of
                          <span class="font-semibold text-black">{{ $inbox->total() }}</span>
                      </span>
                      <ul class="inline-flex items-stretch -space-x-px">
                          <li>
                              <a href="{{ $inbox->previousPageUrl() }}"
                                  class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-neutral-60 bg-white rounded-l-lg border border-neutral-30 hover:bg-neutral-20 hover:text-black duration-[400ms] {{ $inbox->onFirstPage() ? 'cursor-not-allowed' : '' }}">
                                  <span class="sr-only">Previous</span>
                                  <i class="fa-solid fa-chevron-left fa-sm"></i>
                              </a>
                          </li>
                          @foreach ($inbox->getUrlRange(1, $inbox->lastPage()) as $page => $url)
                              <li>
                                  <a href="{{ $url }}"
                                      class="flex items-center justify-center text-sm py-2 px-3 leading-tight {{ $page == $inbox->currentPage() ? 'text-black bg-neutral-20' : 'text-neutral-60 bg-white' }} border border-neutral-30 hover:bg-neutral-20 hover:text-black duration-[400ms] {{ $page == $inbox->currentPage() ? 'z-10' : '' }}">
                                      {{ $page }}
                                  </a>
                              </li>
                          @endforeach
                          <li>
                              <a href="{{ $inbox->nextPageUrl() }}"
                                  class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-neutral-60 bg-white rounded-r-lg border border-neutral-30 hover:bg-neutral-20 hover:text-black duration-[400ms] {{ $inbox->hasMorePages() ? '' : 'cursor-not-allowed' }}">
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

  <!-- Reply Modal -->
  <div id="replyModal" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-3xl max-h-full">
          <!-- Modal content -->
          <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
              <!-- Modal header -->
              <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                  <h3 class="text-2xl font-semibold text-black">Reply Message</h3>
                  <button type="button"
                      class="text-neutral-60 bg-transparent hover:bg-neutral-20 hover:text-black duration-[400ms] rounded-lg text-sm py-4 px-2 ml-auto inline-flex items-center"
                      data-modal-target="replyModal" data-modal-toggle="replyModal">
                      <i class="fa-solid fa-xmark fa-xl"></i>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>

              <!-- Modal body -->
              <form id="reply_modal" method="POST" action="/inbox/reply">
                  @csrf
                  @method('post')
                  <div class="mb-4">
                    <input id="reply" type="hidden" name="reply" value="{{ old('reply') }}">
                    <trix-editor input="reply"></trix-editor>
                  </div>
                    <input type="hidden" name="inbox_id" id="inbox_id">
                  <div class="flex justify-end items-center">
                      <button type="submit"
                          class="text-white bg-primary-40 hover:text-black hover:bg-secondary-40 duration-[400ms] focus:ring-4 focus:outline-none focus:ring-secondary-20 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                          Send
                      </button>
                  </div>
              </form>
          </div>
      </div>
    </div>

@endsection
