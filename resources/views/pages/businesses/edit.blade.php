@extends('layouts.app')

@section('content')
    <div class="bg-gray-200 min-h-screen pb-16 md:pb-32">

        <header>
          <div class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-8">
              <h1 class="text-3xl font-bold leading-tight text-gray-900">
                Dashboard
              </h1>
          </div>
        </header>

        <main>
          <div class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-xl mt-10 font-normal leading-tight text-gray-500">Editting {{$business->name}}</h2>
            <form class="md:flex border border-gray-200 shadow-md rounded-lg mt-6 p-4 md:p-10 bg-white" action="{{route('businesses.update', $business)}}" method="POST">
                @csrf()
                @method("PUT")
                <div class="w-full w-1/2 md:mr-10">
                    <div class="mb-8 relative">
                        <label class="font-semibold md:font-normal text-xs md:text-sm text-gray-800 mb-2 pl-1 block" for="name">Business name</label>
                        <input class="appearance-none placeholder-gray-500 text-xs md:text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('name') border-red-500 @enderror" type="text" name="name" value="{{$business->name}}">
                        @error('name')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                        <div class="mb-8 relative">
                          <label for="category" class="font-semibold md:font-normal text-xs md:text-sm text-gray-800 mb-2 pl-1 block">Category</label>
                          <div class="relative">
                            <select
                                class="appearance-none placeholder-gray-500 text-xs md:text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('name') border-red-500 @enderror"
                                name="category_id">
                                @foreach($categories as $category)
                                  <option value="{{$category->id}}" {{ $category->id == $business->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                        @error('category_id')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-8 relative">
                        <label class="flex justify-start items-start" for="owner">
                          <div class="bg-white border border-gray-400 rounded w-5 h-5 flex flex-shrink-0 justify-center items-center mr-1 focus:outline-none focus:border-indigo-600">
                            <input type="checkbox" name="owner" class="opacity-0 absolute"
                              @if($business->owner === 1) checked @endif>
                            <svg class="fill-current hidden w-4 h-4 text-indigo-600 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                          </div>
                          <div class="select-none text-xs md:text-sm text-gray-800 pl-1 block">I am the business owner/representative</div>
                        </label>
                    </div>
                    <div class="mb-8 relative">
                        <label class="font-semibold md:font-normal text-xs md:text-sm text-gray-800 mb-2 pl-1 block" for="description">Short description of the business</label>
                        <textarea class="appearance-none text-xs md:text-sm placeholder-gray-500 text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('description') border-red-500 @enderror" name="description" rows="4">{{$business->description}}</textarea>
                        @error('description')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex items-center mb-4">
                        <div class="w-full md:w-1/2 relative mr-2 md:mr-4">
                            <label class="font-semibold md:font-normal text-xs md:text-sm text-gray-800 mb-2 pl-1 block" for="address_one">Address line 1</label>
                            <input class="appearance-none text-xs md:text-sm placeholder-gray-500 text-xs md:text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('address_one') border-red-500 @enderror" placeholder="Acme Ltd" type="text" name="address_one" value="{{$business->address_one}}">
                            @error('address_one')
                                <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 relative">
                            <label class="font-semibold md:font-normal text-xs md:text-sm text-gray-800 mb-2 pl-1 block" for="address_two">Address line 2</label>
                            <input class="appearance-none text-xs md:text-sm placeholder-gray-500 text-xs md:text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('address_two') border-red-500 @enderror" placeholder="Grey Fox Road" type="text" name="address_two" value="{{$business->address_two}}">
                            @error('address_two')
                                <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-full md:w-1/2 relative mr-2 md:mr-4">
                            <label class="font-semibold md:font-normal text-xs md:text-sm text-gray-800 mb-2 pl-1 block" for="town">Town/City</label>
                            <input class="appearance-none text-xs md:text-sm placeholder-gray-500 text-xs md:text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('town') border-red-500 @enderror" placeholder="Solihull" type="text" name="town" value="{{$business->town}}">
                            @error('town')
                                <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 relative">
                            <label class="font-semibold md:font-normal text-xs md:text-sm text-gray-800 mb-2 pl-1 block" for="postcode">Postcode</label>
                            <input class="appearance-none text-xs md:text-sm placeholder-gray-500 text-xs md:text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('postcode') border-red-500 @enderror" placeholder="B91 3GJ" type="text" name="postcode" value="{{$business->postcode}}">
                            @error('postcode')
                                <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2 mt-8 md:mt-0 md:ml-10">
                    <div class="mb-8 relative">
                        <label class="font-semibold md:font-normal text-sm text-gray-800 mb-2 pl-1 block" for="product_info">A bit about the product and services</label>
                        <textarea class="appearance-none text-xs md:text-sm placeholder-gray-500 text-gray-800 block w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('product_info') border-red-500 @enderror" name="product_info" rows="4">{{$business->product_info}}</textarea>
                        @error('product_info')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-8 relative">
                        <label class="font-semibold md:font-normal text-sm text-gray-800 mb-2 pl-1 block" for="delivery_info">Please provide delivery or collection details</label>
                        <textarea class="appearance-none text-xs md:text-sm placeholder-gray-500 text-gray-800 block w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('delivery_info') border-red-500 @enderror" name="delivery_info" rows="4">{{$business->delivery_info}}</textarea>
                        @error('delivery_info')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-8 relative">
                        <label class="font-semibold md:font-normal text-sm text-gray-800 mb-2 pl-1 block" for="link">Link to the business website</label>
                        <input class="appearance-none text-xs md:text-sm placeholder-gray-500 text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('link') border-red-500 @enderror" placeholder="Including http:// or https://" type="text" name="link" value="{{$business->link}}">
                        @error('link')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <p class="text-xs md:text-sm text-gray-600 mb-8">
                        After completing this form, we'll quickly review your editted entry and publish in on the business directory.
                    </p>
                    <div class="flex item-center">
                        <a href="{{route('dashboard.show')}}" class="w-full px-8 py-3 mr-4 border border-transparent text-base text-center leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">Cancel</a>

                        <button type="submit" class="w-full px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">Edit</button>
                    </div>
                </form>
          </div>
        </main>

    </div>

@endsection
