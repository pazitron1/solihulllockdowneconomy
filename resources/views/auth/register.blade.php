@extends('layouts.app')

@section('content')
<div class="pb-16 lg:min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full">
    <div>

        <img class="mx-auto h-12 w-auto" src="{{asset('/logos/solihulllockdowneconomy-full.svg')}}" alt="Solihull Lockdown Economy" />

        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
        Create a free account to list your business
        </h2>
    </div>

    <form class="mt-8" method="POST" action="{{ route('register') }}">
        @csrf
      <div class="rounded-md shadow-sm">
        <div>
          <input
            aria-label="Name"
            name="name"
            type="text"
            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:shadow-outline-indigo focus:border-indigo-600 focus:z-10 sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror"
            placeholder="Name"
            value="{{ old('name') }}" />
            @error('name')
                <span class="absolute text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>
        <div class="mt-5 relative">
          <input
            aria-label="Email"
            name="email" type="email"
            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:shadow-outline-indigo focus:border-indigo-600 focus:z-10 sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror"
            placeholder="Email address"
            value="{{ old('email') }}" />
            @error('email')
                <span class="absolute text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>
        <div class="mt-10 relative">
          <input
            aria-label="Password"
            name="password"
            type="password"
            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:shadow-outline-indigo focus:border-indigo-600 focus:z-10 sm:text-sm sm:leading-5 @error('password') border-red-500 @enderror"
            placeholder="Password"
            autocomplete="new-password"/>
            @error('password')
                <span class="absolute text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>
        <div class="mt-5 relative">
          <input
            aria-label="Password confirmation"
            type="password"
            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-600 focus:z-10 sm:text-sm sm:leading-5 @error('password_confirmation') border-red-500 @enderror"
            placeholder="Confirm password"
            name="password_confirmation"
            autocomplete="new-password"/>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end">
        <div class="text-sm leading-5">
          <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
            Already have an account?
          </a>
        </div>
      </div>

      <div class="mt-6 flex flex-col items-center">
        <button type="submit" class="group relative w-full py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          Register
        </button>
        <span class="text-sm uppercase text-gray-500 my-2">Or</span>
        <a href="{{route('login')}}" type="submit" class="group text-center relative w-full py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          Sign in
        </a>
      </div>
    </form>
  </div>
</div>

<!--

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
