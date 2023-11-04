    <nav class=" flex flex-col items-center gap-2 border bg-white border-red-400 py-2 md:sticky lg:sticky top-0 z-50">
        <div class=" flex items-center">
            <h1 class=" text-2xl md:text-3xl lg:text-4xl italic font-serif font-bold ">blooger</h1>
        </div>
        <div class="">
            <ul class=" flex items-center gap-3 md:gap-10 lg:gap-14 text-gray-600">
                {{-- <li>
                    <a href=""
                    class="hover:font-semibold">HOME</a>
                </li>
                <li>
                    <a href=""
                    class="hover:font-semibold">ABOUT</a>
                </li>
                <li>
                    <a href=""
                    class="hover:font-semibold">SERVICES</a>
                </li>
                <li>
                    <a href=""
                    class="hover:font-semibold">BLOG</a>
                </li> --}}
                
                @if (Route::has('login'))

                @auth
                <x-app-layout>
                </x-app-layout>

                <li>
                    <form method="get" action="{{route('home')}}">
                        @method('get')
                        @csrf
                        <div class=" flex rounded-xl bg-gray-200 border border-gray-400">
                            <input type="text" name="keyword" placeholder="search blogs..."
                            class=" rounded-l-xl border-none bg-transparent">
                            <button type="submit"
                            class=" px-4">
                                <img class="icon" src="{{asset('icons/search.ico')}}" alt="">
                            </button>
                        </div>
                    </form>
                </li>

                @else
                <li>
                    <a href="{{route('register')}}"
                    class="hover:font-semibold">SIGNUP</a>
                </li>
                <li>
                    <a href="{{route('login')}}"
                    class="hover:font-semibold">LOGIN</a>
                </li> 
                @endauth
                @endif 
            </ul>
        </div>
    </nav>
