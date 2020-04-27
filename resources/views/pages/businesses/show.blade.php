@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen pb-10">
    <div class="md:w-11/12 mx-auto px-6 lg:px-8">

            <div class="mr-2 py-8 md:py-12 text-sm md:text-base leading-tight font-normal text-gray-500 hover:text-indigo-600 cursor-pointer">
                <a class="flex items-center" href="{{route('businesses.index')}}" aria-label="Back" rel="prev">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5 md:w-6 md:h-6 mr-1"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
                    <span aria-hidden="true">Back</span>
                </a>
            </div>

            <div class="flex flex-col-reverse md:flex-row bg-white rounded-lg border border-gray-200 shadow">
                <div class="w-full md:w-1/2 p-4 md:p-10 lg:min-h-64 sm:py-6">
                    <div>
                        <h1 class="text-2xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-xl sm:leading-none md:text-4xl">{{$business->name}}</h1>
                        <a href="https://www.google.com/maps/place/{{$business->address_one . '+' . $business->address_two . '+' . $business->town . '+' . $business->postcode}}" target="_blank" class="flex items-center my-3 text-gray-600">
                            <p class="text-xs md:text-sm leading-none text-gray-600 mr-1">{{$business->address_two}}</p>
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </a>
                        <p class="mt-3 mb-4 md:mb-10 text-sm text-gray-800 sm:mt-2 md:mt-5 md:text-base lg:mx-0">{{$business->description}}</p>

                        <h2 class="text-indigo-600 sm:text-base text-xl font-semibold mb-3">Lockdown offer</h2>
                        <p class="mt-3 mb-4 md:mb-10 text-sm text-gray-800 sm:mt-2 md:mt-5 md:text-base lg:mx-0">{{$business->product_info}}</p>

                        <h2 class="text-indigo-600 sm:text-base text-xl font-semibold mb-3">Delivery/Collection information</h2>
                        <p class="mt-3 mb-4 md:mb-10 text-sm text-gray-800 sm:mt-2 md:mt-5 md:text-base lg:mx-0">{{$business->delivery_info}}</p>
                    </div>
                    <div class="w-full">
                        <a href="{{$business->link}}" target="_blank" class="w-full border border-transparent text-base leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300 transition duration-150 ease-in-out py-2 px-6 md:py-4 md:text-lg md:px-10">
                        Visit website
                        </a>
                    </div>
                </div>

                <div class="w-full max-w-20 md:max-w-auto md:w-1/2">
                    <img class="object-cover h-full w-full shadow-md object-cover rounded-tr-lg md:rounded-r-lg shadow" src="{{asset($business->imagePath())}}" alt="{{$business->name}}">
                </div>
            </div>

            <div class="mt-6">
                <span class="text-xs md:text-sm text-gray-500">Something does not look right? <a href="" class="text-indigo-500 hover:text-indigo-700">Let us know</a></span>
            </div>

    </div>
</div>

@endsection

