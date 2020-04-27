<div class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-24 bg-indigo-600 rounded-none md:rounded-lg shadow lg:flex lg:items-center my-20">

        <div class="w-full lg:w-1/2 mb-8">
            <h3 class="text-3xl tracking-tight leading-10 font-extrabold text-white sm:text-4xl sm:leading-none md:text-4xl text-left mb-4">
            Get lockdown offers, service updates <br class="hidden md:block">& good news stories
            </h3>
            <p class="text-lg text-indigo-200">Drop us your email if you want to stay in the loop.</p>
        </div>

        <div class="w-full lg:w-1/2">
            <form action="{{route('newsletter.store')}}" method="POST" class="flex items-center">
                @csrf()
                <div class="relative flex-grow mr-3">
                    <input class="appearance-none placeholder-gray-500 text-lg text-gray-800 block w-full px-6 py-3 rounded-md focus:outline-none focus:border-indigo-600 @error('email') border border-red-500 @enderror" placeholder="john.doe@email.com" type="email" name="email" value="{{old('email')}}">
                    @error('email')
                        <span class="absolute mt-1 text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex-none">
                    <button type="submit" class="w-full flex items-center justify-center px-8 py-3 border-2 border-indigo-500 text-base leading-6 font-medium rounded-md text-indigo-100 hover:text-white hover:border-indigo-400 bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out md:text-lg">
                    Join newsletter
                    </button>
                </div>
            </form>
            <p class="text-base text-indigo-200 mt-4">Don't worry - we won't spam!</p>
        </div>
    </div>
