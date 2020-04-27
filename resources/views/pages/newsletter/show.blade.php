@extends('layouts.app')

@section('content')
    <section class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 my-16 md:my-32">
        <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-5xl">
                Join the newsletter,
                <br class="xl:block hidden" />
                    <span class="text-indigo-600">join the community</span>
            </h1>
            <p class="mt-3 text-base text-gray-600 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">We'll let you know when there are new lockdown offers, discounts & some good news stories from Solihull indie businesses.
            </p>
        </div>
    </section>

    <section class="mb-40">
        @include('_partials.newsletters.wide')
    </section>

@endsection
