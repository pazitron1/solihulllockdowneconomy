<a href="{{$business->path()}}" class="sm:mt-0 w-full sm:w-1/2 md:w-1/3 xl:w-1/4 px-2 pb-6">
    <div class="relative pb-5/6">
        <img src="{{asset($business->imagePath())}}" alt="{{$business->category->name}}" class="h-full w-full rounded-lg shadow-md object-cover">
    </div>
    <div class="relative px-4 -mt-20">
        <div class="bg-white rounded-t-lg p-4 shadow-lg">
            <div class="flex items-baseline">
                @if($business->recentListing())
                    <span class="inline-block px-2 py-1 leading-none bg-teal-200 text-teal-800 rounded-full font-semibold uppercase tracking-wide text-xs mr-2">New</span>
                @endif
                <div class="text-xs text-gray-600 font-semibold uppercase tracking-wide">
                    {{$business->category->name}}
                </div>
            </div>
            <h4 class="mt-1 text-gray-900 font-semibold text-lg">{{$business->name}}</h4>
            <div class="mt-1">
                <span class="text-gray-700">{{$business->description}}</span>
            </div>
        </div>
        <div class="rounded-b-lg bg-indigo-100 shadow-lg p-4">
            <div class="flex items-baseline flex-wrap">
                <span class="inline-block px-2 py-2 mb-2 leading-none bg-red-200 text-red-800 rounded-full font-semibold uppercase tracking-wide text-xs">Lockdown offer</span>
                <div class="text-xs text-gray-600 font-semibold tracking-wide">
                    {{$business->product_info}}
                </div>
            </div>
        </div>
    </div>
</a>
