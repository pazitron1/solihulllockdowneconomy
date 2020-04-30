

@extends('layouts.app')

@section('content')
<div class="pb-16 lg:min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full">
    <div>
      <div class="flex items-center justify-center">
        <a href="/" class="flex-shrink-0 mr-2">
            <img class="w-10 hover:opacity-75" src="{{asset('/logos/logo.png')}}" alt="Solihull Lockdown Economy" />
        </a>
        <div class="hidden md:block">
            <span class="block text-base font-semibold leading-none">Solihull</span>
            <span class="block text-sm font-semibold text-indigo-600 leading-none">lockdown economy</span>
        </div>
      </div>
      <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
        Reset your password
      </h2>
      <p class="mt-2 text-center text-sm leading-5 text-gray-600">
        or
        <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
          go back to login
        </a>
      </p>
    </div>
    <form class="mt-8" action="{{route('password.email')}}" method="POST">
      @csrf()
      <div class="rounded-md shadow-sm">
        <div class="relative">
          <input aria-label="Email address" name="email" type="email"  class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-600 focus:z-10 sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus/>
          @error('email')
            <span class="absolute text-red-500 text-xs">{{$message}}</span>
          @enderror
        </div>
      </div>

      <div class="mt-6">
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Send password reset link
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

