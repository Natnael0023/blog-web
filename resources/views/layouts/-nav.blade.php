    <nav id="nav" class=" flex justify-between px-10 items-center gap-2 bg-white rounded-b-xl py-2 md:sticky lg:sticky top-0 z-50  ">
        <div class=" flex items-center">
            <h1 class=" text-2xl md:text-3xl lg:text-4xl italic font-serif font-bold ">blooger</h1>
        </div>
        <div class="">
            <ul class=" flex items-center gap-3 md:gap-10 lg:gap-14 text-gray-600">
                
                @if (Route::has('login'))

                @auth
                
                <x-app-layout>
                </x-app-layout>
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

    <script>
        window.addEventListener('scroll', function(){
            var nav = document.getElementById('nav')
            if(window.pageYOffset > 100){
                nav.classList.add('shadow','duration-500')
            }
            else{
                nav.classList.remove('shadow')
            }
        })
    </script>