@extends('layouts.app')

@section('meta')
    <title>The Solihull Lockdown Economy - recommend a local business</title>
    <meta name="description" content="Do you know a Solihull independent business that you like - recommend it to get listed on our business directory."/>
    <!-- Open Graph data -->
    <meta prefix="og: http://ogp.me/ns#" property="og:title" content="The Solihull Lockdown Economy - recommend a local business" />
    <meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
    <meta prefix="og: http://ogp.me/ns#" property="og:url" content="{{url()->current()}}" />
    <meta prefix="og: http://ogp.me/ns#" property="og:image" content="" />
    <meta prefix="og: http://ogp.me/ns#" property="og:description" content="Do you know a Solihull independent business that you like - recommend it to get listed on our business directory." />
    <meta  prefix="og: http://ogp.me/ns#" property="og:site_name" content="The Solihull Lockdown Economy - recommend a local business" />

      <!-- Twitter META Tags -->
    <meta property="twitter:site" content="@solihulllock">
    <meta name="twitter:creator" content="@solihulllock">
    <meta property="twitter:title" content="The Solihull Lockdown Economy - recommend a local business">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:description" content="Do you know a Solihull independent business that you like - recommend it to get listed on our business directory.">
    <meta name="twitter:image:alt" content="The Solihull Lockdown Economy - recommend a local business">
@endsection

@section('content')
<div class="bg-indigo-100">
    <section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 pt-16 md:pt-32">
        <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-5xl">
                Want to recommend a local business?
            </h1>
            <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">It's free to be featured on the Solihull Lockdown Economy. Just pop the details of the business you think we should list below. We'll be in touch if we have any questions.
            </p>
        </div>
    </section>
    <section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-16 md:pb-32 flex cursor-pointer flex-wrap">
        <form class="md:flex border border-gray-200 shadow-md rounded-lg p-10 bg-white" action="{{route('recommend.store')}}" method="POST">
                @csrf()
                <div class="w-1/2 md:mr-10">
                    <div class="mb-8 relative">
                        <label class="text-sm text-gray-800 mb-2 pl-1 block" for="name">Your name</label>
                        <input class="appearance-none placeholder-gray-500 text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('name') border-red-500 @enderror" placeholder="John Doe" type="text" name="name" value="{{old('name')}}">
                        @error('name')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-8 relative">
                        <label class="text-sm text-gray-800 mb-2 pl-1 block" for="email">Your email</label>
                        <input class="appearance-none placeholder-gray-500 text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('email') border-red-500 @enderror" placeholder="john.doe@email.com" type="email" name="email" value="{{old('email')}}">
                        @error('email')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-8 relative">
                        <label class="text-sm text-gray-800 mb-2 pl-1 block" for="business_name">Business name</label>
                        <input class="appearance-none placeholder-gray-500 text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('business_name') border-red-500 @enderror" placeholder="Name of the business/brand" type="text" name="business_name" value="{{old('business_name')}}">
                        @error('business_name')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-8 relative">
                        <label class="text-sm text-gray-800 mb-2 pl-1 block" for="business_website">Business website</label>
                        <input class="appearance-none placeholder-gray-500 text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('business_website') border-red-500 @enderror" placeholder="https://www.example.com" type="text" name="business_website" value="{{old('business_website')}}">
                        @error('business_website')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-8 relative">
                        <label class="text-sm text-gray-800 mb-2 pl-1 block" for="description">Short description of the business</label>
                        <span class="pl-1 mb-2 text-gray-500 text-sm">
                            No more than 255 characters please
                        </span>
                        <counter :limit="255" inline-template>
                            <div>
                                <textarea v-model="message" @keyup="charCount()" class="appearance-none placeholder-gray-500 text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('description') border-red-500 @enderror" name="description" rows="4">{{old('description')}}</textarea>
                                <span class="absolute mr-4 bottom-0 right-0 text-gray-500 text-sm"
                                    :class="computedClass">
                                    @{{totalCharacters}} characters
                                </span>
                            </div>
                        </counter>
                        @error('description')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="w-1/2 md:ml-10">
                    <div class="mb-8 relative">
                        <label class="text-sm text-gray-800 mb-1 pl-1 block" for="product_info">The lockdown offer</label>
                        <span class="pl-1 mb-2 text-gray-500 text-sm">
                            No more than 100 characters please
                        </span>
                        <counter :limit="100" inline-template>
                            <div>
                                <textarea v-model="message" @keyup="charCount()" class="appearance-none placeholder-gray-500 text-gray-800 block w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('lockdown_offer') border-red-500 @enderror" name="lockdown_offer" rows="4">{{old('lockdown_offer')}}</textarea>
                                <span class="absolute mr-4 bottom-0 right-0 text-gray-500 text-sm"
                                    :class="computedClass">
                                    @{{totalCharacters}} characters
                                </span>
                            </div>
                        </counter>
                        @error('lockdown_offer')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-8 relative">
                        <label class="text-sm text-gray-800 mb-1 pl-1 block" for="delivery_info">Any delivery/collection information</label>
                        <span class="pl-1 mb-2 text-gray-500 text-sm">
                            No more than 255 characters please. Including social distancing measures if required
                        </span>
                        <span class="pl-1 mb-2 text-gray-500 text-sm">

                        </span>
                        <counter :limit="255" inline-template>
                            <div>
                                <textarea v-model="message" @keyup="charCount()" class="appearance-none placeholder-gray-500 text-gray-800 block w-full px-4 py-3 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('delivery_info') border-red-500 @enderror" name="delivery_info" rows="4">{{old('delivery_info')}}</textarea>
                                <span class="absolute mr-4 bottom-0 right-0 text-gray-500 text-sm"
                                    :class="computedClass">
                                    @{{totalCharacters}} characters
                                </span>
                            </div>
                        </counter>
                        @error('delivery_info')
                            <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                    <p class="text-sm text-gray-600 mb-8">
                        Thank you for your recommendation, we'll review and publish it on our directory shortly.
                    </p>
                    <div>
                        <button class="w-full px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">Recommend business</button>
                    </div>
                </form>
    </section>
</div>
@endsection
