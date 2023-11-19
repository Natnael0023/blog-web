<div class=" bg-white border sticky top-24 rounded-xl">
    <div class=" flex flex-col  items-start">
            @foreach ( $menulinks  as $menu)
            <a href="{{route($menu->route)}}" class="   flex gap-3 items-center p-2 px-10 w-[15rem] hover:bg-gray-200 cursor-pointer {{ (Route::is($menu->route))? 'text-black font-semibold bg-gray-200': ' text-gray-500' }} ">
                <img class="icon" src="{{asset('icons/'.$menu->icon)}}" alt="">
                <span>{{ $menu->name}}</span>
            </a>
            @endforeach
    </div>
</div>