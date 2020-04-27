@extends('layouts.manage')

@section('content')
<div>


  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold leading-tight text-gray-900">
        Create a category
      </h1>
    </div>
  </header>

  <main>
      <div class="max-w-2xl mr-auto py-6 sm:px-6 lg:px-8">
          <form class="mt-8" method="POST" action="{{ route('manage.categories.store') }}">
            @csrf
            <div class="rounded-md shadow-sm">
              <div>
                <input
                  aria-label="Name"
                  name="name"
                  type="text"
                  class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror"
                  placeholder="Food"
                  value="{{ old('name') }}" />
                  @error('name')
                      <span class="absolute text-red-500 text-xs">{{$message}}</span>
                  @enderror
              </div>

              <div class="mt-6">
                <button type="submit" class="group relative w-full py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                  Register
                </button>
              </div>
            </div>
          </form>
      </div>
  </main>
</div>
@endsection
