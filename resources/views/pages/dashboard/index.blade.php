@extends('layouts.app')

@section('content')
    <div class="bg-gray-200 min-h-screen">

        <header>
            <div class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Dashboard
                </h1>
            </div>
        </header>

        <main>
            <div class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8">
              <h2 class="text-xl mt-10 font-normal leading-tight text-gray-500">My entries</h2>
                @forelse($businesses as $business)
                  <div class="py-6">
                    <div class="lg:flex lg:items-center lg:justify-between">
                      <div class="flex-1 min-w-0">
                        <div class="flex items-center mb-2">
                          <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-2xl sm:leading-9 sm:truncate">
                          {{$business->name}}
                          </h2>
                          <span class="inline-block ml-2 px-2 py-1 leading-none bg-teal-200 text-teal-600 rounded-full font-semibold uppercase tracking-wide text-tiny">Published</span>
                        </div>
                        <div class="flex items-center sm:flex-row sm:flex-wrap">
                          <a href="{{$business->path()}}" class="flex items-center text-sm leading-5 text-gray-500 group hover:text-indigo-600 mr-1 sm:mr-6">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400 group-hover:text-indigo-600"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            {{$business->slug}}
                          </a>
                          <div class="flex items-center text-sm leading-5 text-gray-500 mr-2 sm:mr-6">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            {{$business->category->name}}
                          </div>
                          <div class="flex items-center text-sm leading-5 text-gray-500">
                            <svg class="mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            Created: {{ Carbon\Carbon::parse($business->created_at)->format('d M Y') }}
                          </div>
                        </div>
                      </div>
                      <div class="mt-3 md:mt-5 flex lg:mt-0 lg:ml-4">
                        <span class="rounded-md sm:mr-3">
                          <a href="{{$business->path()}}" class="shadow-sm  inline-flex items-center mr-2 px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            <svg fill="none" stroke="currentColor" class="-ml-1 mr-2 h-5 w-5 text-gray-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            View
                          </a>
                        </span>
                        <span class="rounded-md">
                          <a href="{{route('businesses.edit', $business)}}" class="shadow-sm inline-flex items-center mr-2 px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>
                            Edit
                          </a>
                        </span>
                        <!--Delete Component-->
                        <delete-confirmation :business="{{$business}}" inline-template>
                          <div>
                            <transition name="fade">
                              <modal name="delete-confirmation-{{$business->id}}"
                               classes="bg-gray-900 border-2 border-gray-800 rounded-lg"
                               height="auto"
                               :width="360"
                               scrollable>
                                <div class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
                                <div class="fixed inset-0 transition-opacity">
                                  <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>
                                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                                  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                      <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                      </div>
                                      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                          Delete {{$business->name}}
                                        </h3>
                                        <div class="mt-2">
                                          <p class="text-sm leading-5 text-gray-500">
                                            Are you sure you want to delete {{$business->name}} from the business directory? All of your data will be permanantly removed. This action cannot be undone.
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-md sm:ml-3 sm:w-auto">
                                      <button @click.prevent="deleteEntry" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Delete
                                      </button>
                                    </span>
                                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                      <button @click.prevent="$modal.hide('delete-confirmation-{{$business->id}}')" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Cancel
                                      </button>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </modal>
                          </transition>
                          </div>
                        </delete-confirmation>
                        <!--End of Delete Component -->

                        <span class="sm:ml-3 shadow-sm rounded-md">
                          <button @click.prevent="$modal.show('delete-confirmation-{{$business->id}}')" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-red-700 transition duration-150 ease-in-out">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="-ml-1 mr-2 h-5 w-5"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Delete
                          </button>
                        </span>

                      </div>
                    </div>
                  </div>
                @empty
                  <div class="flex flex-col mx-auto items-center justify-center text-gray-400">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-12 h-12 mb-3"><path d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                       <h3 class="text-base md:text-xl text-gray-400">No published businesses...</h3>
                       <a href="{{route('businesses.create')}}" class="button-primary mt-6">Add my business</a>
                  </div>
                @endforelse
            </div>
          </main>



    </div>

@endsection
