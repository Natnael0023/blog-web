{{-- <nav x-data="{ open: false }" class=" " >
    <!-- Primary Navigation Menu -->
    <div class="">
        <div class="">

            <!-- Settings Dropdown -->
            <div class="  ">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <li>
                            <button class=" flex gap-2 items-center  bg-white  p-2 border-gray-300">
                                <div class=" w-[3rem] h-[3rem] ">
                                    <img src= "{{asset('/images/avatar/'.Auth::user()->avatar)}}"  alt="{{substr(auth()->user()->name,0,1)}}"
                                    class=" w-full h-full rounded-full bg-blue-300 flex justify-center items-center text-3xl">
                                </div>
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </li>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.show',auth()->user())">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot> 
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 ">
            <div class="px-4">
                <div class="font-medium text-base dark:text-white  ">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm ">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}

<nav x-data="{ open: false }">
    <!-- Settings Dropdown -->
    <div>
        <div>
            <button @click="open = !open" class="flex items-center gap-1 bg-white">
                <div class="w-12 h-12 rounded-full bg-blue-300 flex justify-center items-center text-3xl">
                    <img src="{{asset('images/avatar/'.Auth::user()->avatar)}}" alt="{{ substr(auth()->user()->name, 0, 1) }}"
                    class=" w-full h-full rounded-full object-cover">
                </div>
                <div class=" hidden sm:block">{{ Auth::user()->name }}</div>
                {{-- <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div> --}}
            </button>
        </div>

        <!-- Dropdown menu -->
        <div x-show="open" @click.away="open = false" class=" bg-white absolute border rounded">
            <ul class=" flex flex-col items-start">
                <li class=" p-2 px-5 hover:bg-gray-200 w-full">
                    <a href="{{ route('profile.show', auth()->user()) }}">Profile</a>
                </li>
                <li class=" p-2 px-5 hover:bg-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Hamburger -->
    {{-- <div class="flex items-center sm:hidden">
        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div> --}}
</nav>
