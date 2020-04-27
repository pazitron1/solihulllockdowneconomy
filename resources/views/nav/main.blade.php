<transition name="fade">
    <nav :class="{'block bg-indigo-600': open, 'bg-white shadow': !open}">
        <div class="md:w-11/12 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div>
                    <a href="/" class="flex-shrink-0">
                        <img class="w-44 hover:opacity-75" src="{{asset('/logos/solihulllockdowneconomy-full.svg')}}" alt="Solihull Lockdown Economy" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="hidden md:block">
                        <div class="ml-0 md:ml-10 flex items-baseline">
                            <a href="{{route('businesses.index')}}" class="ml-1 md:ml-4 nav-item md:text-base">Discover</a>
                            <a href="{{route('about')}}" class="ml-1 md:ml-4 nav-item md:text-base">About</a>
                            <a href="{{route('contact.show')}}" class="ml-1 md:ml-4 nav-item md:text-base">Contact us</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 md:ml-6">
                        @auth
                        <dropdown inline-template>
                            <div class="flex items-center">
                                <div class="mr-8 relative">
                                     <button @click="isDropDownOpen =!isDropDownOpen"
                                             class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid" id="user-menu"
                                             aria-label="User menu"
                                             aria-haspopup="true">
                                        <img class="h-8 w-8 rounded-full" src="https://www.gravatar.com/avatar/{{ md5( Auth::user()->email) }}.jpg?s=64" alt="User avatar" />
                                    </button>

                                    <div v-if="isDropDownOpen" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg">
                                        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                              <a href="#" class="flex items-cetner block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100" role="menuitem">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5 mr-2"><path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Profile</a>
                                              <a href="{{route('dashboard.show')}}" class="flex items-cetner block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100" role="menuitem">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5 mr-2"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                                Listings</a>

                                             <a href="{{ route('logout') }}"
                                                class="flex items-cetner block px-4 py-2 text-sm text-indigo-700 hover:bg-indigo-100"
                                                role="menuitem"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5 mr-2"><path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                                Sign out
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                </dropdown>
                            </div>

                            <a href="{{route('businesses.create')}}" class="button-primary">Add my business</a>
                        </div>
                        @endauth
                        @guest
                            <a href="{{route('login')}}" class="mr-4 nav-item">Sign in</a>
                            <a href="{{route('register')}}" class="button-primary">List my business</a>
                        @endguest
                    </div>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 focus:outline-none" x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex text-indigo-100': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div :class="{'block': open, 'hidden': !open}">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium focus:outline-none focus:text-white  {{ request()->routeIs('businesses*') || request()->routeIs('category.businesses*') ? 'bg-indigo-700 text-indigo-100' : 'text-indigo-200' }}">
                    Discover
                </a>
                <a href="{{route('about')}}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-indigo-200 focus:outline-none">About</a>
                <a href="{{route('contact.show')}}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-indigo-200 focus:outline-none">Contact us</a>
            </div>
            <div class="pt-4 pb-3 border-t border-indigo-500">
                @auth
                    <div class="flex items-center mb-3 px-5">
                      <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://www.gravatar.com/avatar/{{ md5( Auth::user()->email) }}.jpg?s=64" alt="User Avatar" />
                      </div>
                      <div class="ml-3">
                        <div class="text-base font-medium leading-none text-indigo-200">{{Auth::user()->name}}</div>
                        <div class="mt-1 text-sm font-medium leading-none text-indigo-400">{{Auth::user()->email}}</div>
                      </div>
                    </div>
                    <div class="mt-3 px-2" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-indigo-200 focus:text-white" role="menuitem">Your Profile</a>
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-indigo-200 focus:outline-none" role="menuitem">Settings</a>
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-indigo-200 focus:outline-none" role="menuitem">Sign out</a>
                    </div>
                @endauth
                @guest
                    <div class="px-2" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">
                        <a href="{{route('login')}}" class="block px-3 py-2 rounded-md text-base font-medium text-indigo-200 focus:text-white" role="menuitem">Sign in</a>
                        <a href="{{route('register')}}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-indigo-200 focus:outline-none" role="menuitem">List my business</a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</transition>

