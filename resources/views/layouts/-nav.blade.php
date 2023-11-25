    <nav id="nav" class=" flex justify-between py-1 md:px-32 lg:px-72 px-10 items-center gap-2 bg-white rounded-b-xl   md:sticky lg:sticky top-0 z-50  ">
        <div class=" flex items-center">
            <h1 class=" text-2xl tracking-tighter text-blue-500 md:text-3xl lg:text-4xl  font-semibold italic  ">bloog</h1>
            @can('admin')
                <span class=" ml-2 text-gray-400">admin</span>
            @endcan
        </div>
        <div class="">
            <ul class=" flex items-center gap-3 md:gap-10 lg:gap-14 text-gray-600">

                @can('admin')  
                <a href="{{route('admin.index')}}">
                    Admin Dashboard
                </a>
                @endcan

                
                @if (Route::has('login'))
                

                @auth

                <li>
                    <a href="{{route('notif.index')}}">
                        <img class="icon" src="{{asset('icons/bell.ico')}}" alt="">
                        <span></span>
                    </a>
                </li>
                
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