<div class="md:w-11/12 mx-auto pr-0 px-6 lg:px-8 py-8 md:py-12">
    <div class="flex flex-no-wrap items-center w-full overflow-x-scroll">
        <a href="/businesses"
            class="nav-item mr-2 md:mr-4 md:text-base flex-none {{ Request::is('businesses') && !request()->has('recent') ? 'text-indigo-700 bg-indigo-100' : '' }}">
            All
        </a>
        <a href="/businesses?recent=1"
            class="nav-item mr-2 md:mr-4 md:text-base flex-none {{ request()->has('recent') ? 'text-indigo-700 bg-indigo-100' : '' }}">
            Recently added
        </a>
        @foreach($categories as $category)
            <a href="{{route('category.businesses.index', $category)}}"
                class="nav-item mr-2 md:mr-4 md:text-base flex-none {{ request()->is('businesses/' . $category->slug) ? 'text-indigo-700 bg-indigo-100' : '' }}">
                {{$category->name}}
            </a>
        @endforeach
    </div>
</div>
