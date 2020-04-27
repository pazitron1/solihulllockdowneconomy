@if ($paginator->hasPages())
    <nav>
        <ul class="flex justify-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="mr-2 p-2 text-base font-normal text-gray-300 cursor-not-allowed">
                    <span class="flex items-center cursor-not-allowed text-gray-300">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 mr-1"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
                        <span aria-hidden="true">Back</span>
                    </span>
                </li>
            @else
                <li class="mr-2 p-2 text-base font-normal text-gray-500 hover:text-indigo-600 cursor-pointer">
                    <a class="flex items-center" href="{{ $paginator->previousPageUrl() }}" aria-label="Back" rel="prev">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 mr-1"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
                        <span aria-hidden="true">Back</span>
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="ml-2 p-2 text-base font-normal text-gray-500 hover:text-indigo-600 cursor-pointer">
                    <a class="flex items-center" href="{{ $paginator->nextPageUrl() }}" aria-label="Next" rel="next">
                        <span aria-hidden="true">Next</span>
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 ml-1"><path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </a>
                </li>
            @else
                <li class="ml-2 p-2 text-base font-normal text-gray-300 cursor-not-allowed">
                    <span class="flex items-center cursor-not-allowed">
                        <span aria-hidden="true">Next</span>
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 ml-1"><path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
