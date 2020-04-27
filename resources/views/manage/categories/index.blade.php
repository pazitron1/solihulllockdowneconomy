@extends('layouts.manage')

@section('content')
<div>


  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold leading-tight text-gray-900">
        Categories
      </h1>
    </div>
  </header>

  <main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @forelse($categories as $category)
          <div class="px-4 py-6 sm:px-0">
            <div class="lg:flex lg:items-center lg:justify-between">
              <div class="flex-1 min-w-0">
                <h2 class="text-base font-bold leading-7 text-gray-900 sm:text-2xl sm:leading-9 sm:truncate">
                  {{$category->name}}
                </h2>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                  <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    {{$category->slug}}
                  </div>
                  <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Number of businesses
                  </div>
                  <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    Published: {{ Carbon\Carbon::parse($category->created_at)->format('d M Y') }}
                  </div>
                </div>
              </div>
              <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <span class="shadow-sm rounded-md">
                  <button @click.prevent="$modal.show('edit-category-{{$category->id}}')" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                    </svg>
                    Edit
                  </button>
                </span>
                <!--Edit Component-->
                <category-edit :category="{{$category}}" inline-template>
                <div>
                  <transition name="fade">
                      <modal name="edit-category-{{$category->id}}"
                             classes="bg-gray-900 border-2 border-gray-800 rounded-lg"
                             height="auto"
                             :width="360"
                             scrollable>
                             <div class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
                                <div class="fixed inset-0 transition-opacity">
                                  <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>
                                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                                  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-5">
                                    <div class="sm:flex sm:items-start">
                                      <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="h-6 w-6 text-gray-600"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                      </div>
                                      <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                          Editing {{$category->name}}
                                        </h3>
                                        <div class="mt-2">
                                          <input
                                            aria-label="Name"
                                            name="name"
                                            type="text"
                                            class="w-full appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror"
                                            v-model="categoryname" />
                                            @error('name')
                                                <span class="absolute text-red-500 text-xs">{{$message}}</span>
                                            @enderror
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="bg-gray-50 px-4 py-3 pb-5 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                      <button @click.prevent="updateCategory" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Save
                                      </button>
                                    </span>
                                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                      <button @click.prevent="$modal.hide('edit-category-{{$category->id}}')" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Cancel
                                      </button>
                                    </span>
                                  </div>
                                </div>
                              </div>
                      </modal>
                  </transition>
                </div>
              </category-edit>
              <!--End of Edit Component -->

                <span class="sm:ml-3 shadow-sm rounded-md">
                  <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-red-700 transition duration-150 ease-in-out">
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
               <h3 class="text-base md:text-xl text-gray-400">No categories..</h3>
          </div>
        @endforelse
    </div>
  </main>
</div>
@endsection
