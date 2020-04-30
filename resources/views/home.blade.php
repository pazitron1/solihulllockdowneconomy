@extends('layouts.app')

@section('meta')
    <title>The Solihull Lockdown Economy</title>
    <meta name="description" content="Independent businesses in Solihull offering products and services during lockdown. Fresh produce, ready meals, supplies, mental health help, fitness classes and shops and more!"/>
    <!-- Open Graph data -->
    <meta prefix="og: http://ogp.me/ns#" property="og:title" content="Welcome to the Solihull Lockdown Economy" />
    <meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
    <meta prefix="og: http://ogp.me/ns#" property="og:url" content="{{url()->current()}}" />
    <meta prefix="og: http://ogp.me/ns#" property="og:image" content="https://res.cloudinary.com/solihull-lockdown-economy/image/upload/dpr_auto,w_auto,f_auto,q_auto:good/v1588241085/SEO%20images/Home%20page/Social_media_banner_nqndzt.jpg" />
    <meta prefix="og: http://ogp.me/ns#" property="og:description" content="Independent businesses in Solihull offering products and services during lockdown. Fresh produce, ready meals, supplies, mental health help, fitness classes and shops and more!" />
    <meta  prefix="og: http://ogp.me/ns#" property="og:site_name" content="The Solihull Lockdown Economy" />
    <meta property="fb:app_id" content="1207509819640694">

      <!-- Twitter META Tags -->
    <meta property="twitter:site" content="@solihulllock">
    <meta name=”twitter:url” content=”{{url()->current()}}” />
    <meta property="twitter:title" content="Welcome to the Solihull Lockdown Economy">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:description" content="Independent businesses in Solihull offering products and services during lockdown. Fresh produce, ready meals, supplies, mental health help, fitness classes and shops and more!">
    <meta name=”twitter:image” content=”https://res.cloudinary.com/solihull-lockdown-economy/image/upload/dpr_auto,w_auto,f_auto,q_auto:good/v1588241085/SEO%20images/Home%20page/Social_media_banner_nqndzt.jpg” />
@endsection

@section('content')
<section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 my-16 md:my-32">
    <div class="sm:text-center lg:text-left">
        <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-5xl">
            Discover Solihull's best indie businesses
            <br class="xl:block hidden" />
                <span class="text-indigo-600">offering products & services during lockdown</span>
        </h1>
        <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Get lockdown offers and easily find local, indie alternatives to bid brand names and chains.
        </p>
        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="rounded-md shadow">
                <a href="{{route('businesses.index')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                Browse all
                </a>
            </div>
            <div class="mt-3 sm:mt-0 sm:ml-3">
                <a href="{{route('newsletter.create')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                Join newsletter
                </a>
            </div>
        </div>
    </div>
</section>
<section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 my-16 md:my-32 flex cursor-pointer flex-wrap">
    @forelse($listings as $business)
        @include('_partials.listings.tile')
    @empty
        <div class="flex flex-col mx-auto items-center justify-center text-gray-400">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-12 h-12 mb-3"><path d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
             <h3 class="text-base md:text-xl text-gray-400">No listings yet... Please check back later!</h3>
        </div>
    @endforelse
</section>
<section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 my-16 md:my-32 flex cursor-pointer flex-wrap flex-col">
    <h2 class="text-3xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-4xl sm:leading-none md:text-4xl text-center">Are you a Solihull-based independent business?</h2>
    <p class="text-base text-gray-600 text-center mt-3">List your business on Solihull Lockdown Economy. It's free!</p>
    <div class="mt-5 sm:mt-8 flex-col md:flex-row sm:justify-center lg:justify-start flex items-center mx-auto">
        <div class="rounded-md shadow">
            <a href="{{route('businesses.index')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
            List your business
            </a>
        </div>
        <span class="uppedcase text-gray-500 mx-4 text-sm my-3 md:my-0">OR</span>
        <div>
            <a href="{{route('recommend.create')}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline focus:border-indigo-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
            Recommend business
            </a>
        </div>
    </div>
</section>
<section class="mb-40">
    @include('_partials.newsletters.wide')
</section>
@endsection
