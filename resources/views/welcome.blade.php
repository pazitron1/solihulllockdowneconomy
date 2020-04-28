@extends('layouts.app')

@section('meta')
    <title>The Solihull Lockdown Economy - discover local independent businesses</title>
    <meta name="description" content="Browse independent businesses offering goods and services during lockdown in Solihull."/>
    <!-- Open Graph data -->
    <meta prefix="og: http://ogp.me/ns#" property="og:title" content="The Solihull Lockdown Economy - discover local independent businesses" />
    <meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
    <meta prefix="og: http://ogp.me/ns#" property="og:url" content="{{url()->current()}}" />
    <meta prefix="og: http://ogp.me/ns#" property="og:image" content="" />
    <meta prefix="og: http://ogp.me/ns#" property="og:description" content="Browse independent businesses offering goods and services during lockdown in Solihull." />
    <meta  prefix="og: http://ogp.me/ns#" property="og:site_name" content="The Solihull Lockdown Economy - discover local independent businesses" />

      <!-- Twitter META Tags -->
    <meta property="twitter:site" content="@solihulllock">
    <meta name="twitter:creator" content="@solihulllock">
    <meta property="twitter:title" content="The Solihull Lockdown Economy - discover local independent businesses">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:description" content="Browse independent businesses offering goods and services during lockdown in Solihull.">
    <meta name="twitter:image:alt" content="The Solihull Lockdown Economy - discover local independent businesses">
@endsection

@section('content')

    <div class="bg-gray-100 pb-16 md:pb-32">

        @include('_partials.listings.filters')

        <div class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 flex cursor-pointer flex-wrap">
            @forelse($listings as $business)
                @include('_partials.listings.tile')
            @empty
                <div class="flex flex-col mx-auto items-center justify-center text-gray-400">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-12 h-12 mb-3"><path d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                     <h3 class="text-base md:text-xl text-gray-400">No listings yet... Please check back later!</h3>
                </div>

            @endforelse
        </div>

        {{$listings->links('vendor.pagination.simple-default')}}

        <div class="md:w-11/12 mx-auto pr-0 px-6 lg:px-8 py-8 md:py-12">
            <div class="flex flex-col md:flex-row mx-auto items-center justify-center">
                <p class="text-base text-gray-400 mb-4 md:mr-4 md:mb-0">Are we missing anything?</p>
                <div class="">
                     <a href="{{route('recommend.create')}}" class="border border-transparent text-sm leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300 transition duration-150 ease-in-out py-2 px-4 md:py-3 md:text-base md:px-6">Recommend a business</a>
                </div>
            </div>
        </div>
    </div>
@endsection
