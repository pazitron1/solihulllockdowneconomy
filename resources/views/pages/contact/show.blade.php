@extends('layouts.app')

@section('meta')
    <title>The Solihull Lockdown Economy - contact us</title>
    <meta name="description" content="Are you an independent businesses owner based in Solihull? Want to recommend an indie business? Get in touch."/>
    <!-- Open Graph data -->
    <meta prefix="og: http://ogp.me/ns#" property="og:title" content="The Solihull Lockdown Economy - contact us" />
    <meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
    <meta prefix="og: http://ogp.me/ns#" property="og:url" content="{{url()->current()}}" />
    <meta prefix="og: http://ogp.me/ns#" property="og:image" content="" />
    <meta prefix="og: http://ogp.me/ns#" property="og:description" content="Are you an independent businesses owner based in Solihull? Want to recommend an indie business? Get in touch." />
    <meta  prefix="og: http://ogp.me/ns#" property="og:site_name" content="The Solihull Lockdown Economy - contact us" />

      <!-- Twitter META Tags -->
    <meta property="twitter:site" content="@solihulllock">
    <meta name="twitter:creator" content="@solihulllock">
    <meta property="twitter:title" content="The Solihull Lockdown Economy - contact us">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:description" content="Are you an independent businesses owner based in Solihull? Want to recommend an indie business? Get in touch.">
    <meta name="twitter:image:alt" content="The Solihull Lockdown Economy - contact us">
@endsection

@section('content')
<div class="bg-indigo-100">
    <section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 pt-16 md:pt-32">
        <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-5xl">
                Get in touch
            </h1>
            <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Want to get in touch or recommend to list a business that isn't yours? Get in touch using the form below.
            </p>
        </div>
    </section>
    <section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-16 md:pb-32 flex cursor-pointer flex-wrap">
        <form action="{{route('contact.store')}}" method="POST">
            @csrf()
            <div class="mb-8 relative">
                <label class="text-sm text-gray-800 mb-2 pl-1 block" for="name">Your name</label>
                <input class="appearance-none placeholder-gray-500 text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('name') border-red-500 @enderror" placeholder="John doe" type="text" name="name" value="{{old('name')}}">
                @error('name')
                    <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-8 relative">
                <label class="text-sm text-gray-800 mb-2 pl-1 block" for="email">Email</label>
                <input class="appearance-none placeholder-gray-500 text-sm text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('email') border-red-500 @enderror" placeholder="john@doe.com" type="text" name="email" value="{{old('email')}}">
                @error('email')
                    <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-8 relative">
                <label class="text-sm text-gray-800 mb-2 pl-1 block" for="message">Leave a message</label>
                <textarea class="appearance-none placeholder-gray-500 text-gray-800 block w-full px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-600 @error('message') border-red-500 @enderror" name="message" rows="4">{{old('message')}}</textarea>
                @error('message')
                    <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
            <p class="text-sm text-gray-600 mb-8">
                Thanks for your message we'll get back to you as soon as possible.
            </p>
            <div>
                <button type="submit" class="w-full px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">Leave message</button>
            </div>
        </form>
    </section>
</div>
@endsection
