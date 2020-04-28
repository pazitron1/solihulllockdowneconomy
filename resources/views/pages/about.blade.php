@extends('layouts.app')

@section('meta')
    <title>About the Solihull Lockdown Economy</title>
    <meta name="description" content="Are you an independent businesses owner based in Solihull? Want to recommend an indie business? Get in touch."/>
    <!-- Open Graph data -->
    <meta prefix="og: http://ogp.me/ns#" property="og:title" content="About the Solihull Lockdown Economy" />
    <meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
    <meta prefix="og: http://ogp.me/ns#" property="og:url" content="{{url()->current()}}" />
    <meta prefix="og: http://ogp.me/ns#" property="og:image" content="" />
    <meta prefix="og: http://ogp.me/ns#" property="og:description" content="Learn about the Solihull Lockdown Economy and the team behind it." />
    <meta  prefix="og: http://ogp.me/ns#" property="og:site_name" content="About the Solihull Lockdown Economy" />

      <!-- Twitter META Tags -->
    <meta property="twitter:site" content="@solihulllock">
    <meta name="twitter:creator" content="@solihulllock">
    <meta property="twitter:title" content="About the Solihull Lockdown Economy">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:description" content="Learn about the Solihull Lockdown Economy and the team behind it.">
    <meta name="twitter:image:alt" content="About the Solihull Lockdown Economy">
@endsection

@section('content')
    <section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 my-16 md:my-32">
        <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-5xl">
                About,
                <br class="xl:block hidden" />
                    <span class="text-indigo-600">Solihull Lockdown Economy</span>
            </h1>
            <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Hello, nice to meet you!👋
            </p>
        </div>
    </section>

    <section class="mb-40">
        <section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 my-16 md:my-32">
            <div class="sm:max-w-xl">
                <p class="text-base text-gray-600 mb-4">Hi, my name is <a class="underline" href="https://www.linkedin.com/in/antonsirik/" target="_blank">Anton</a>, I am a Digital Marketing professional by day☀️ and a web developer by night.🌙 </p>
                <p class="text-base text-gray-600 mb-4">At the start of the lockdown I came across <a class="underline" href="https://www.edinburghlockdowneconomy.com/about" target="_blank">the Edinburgh Lockdown Economy</a> website which was designed to help local businesses during the lockdown. It inspired me to do something similar here, in Solihull.</p>
                <p class="text-base text-gray-600 mb-4">The Solihull Lockdown Economy aims to help Solihull local independent businesses spread the word about the products and services they offer during the lockdown. I hope this site will become the-go-to resource for finding great local alternatives to supermarket and big brand chains.</p>
                <p class="text-base text-gray-600">If you have a local business or want to recommend one, please give us a shot on the <a class="underline cursor-pointer" href="{{route('contact.create')}}">contact us page.</a></p>
            </div>
        </section>
    </section>

@endsection
