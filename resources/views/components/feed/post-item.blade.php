<div class=" flex flex-col w-full md:w-[30rem]  lg:w-[30rem] border rounded-xl bg-white hover:shadow">
    <div class="  flex justify-between items-center p-3">
        <div class=" flex  items-center gap-2">
            <div class=" h-[3rem] w-[3rem] rounded-full">
                <img src="{{asset('/images/'.$post->image)}}" alt=""
                class=" rounded-full h-full w-full">
            </div>
            <div>
                <p>
                    {{$post->user->name}}  
                  </p>
                  <p
                      class=" text-gray-400 text-sm">
                      {{$post->created_at}}
                </p>
            </div>
        </div>
        {{-- edit & delete --}}
        @if ($post->user_id === auth()->user()->id) 
            <div class=" flex gap-2 ">
                <a href="{{route('post.edit',['post'=>$post])}}"
                    class="opacity-50 hover:opacity-100">
                    <img class="icon" src="{{asset('/icons/createpost.ico')}}" alt="">
                </a>
                <a href="{{route('post.delete',['post'=>$post])}}"
                    class=" opacity-50 hover:opacity-100">
                    <img class="icon" src="{{asset('/icons/delete.ico')}}" alt="">
                </a>
            </div>
        @endif
        {{-- //edit & delete --}}
    </div>
    <div class=" px-3">
        <div class=" flex items-center justify-between">
            <h2 class=" text-xl">
                {{$post->title}}
            </h2>
        </div>
        <p class=" text-gray-500 text-sm">
            {{$post->text}}
        </p>
    </div>
    <div class=" mt-2 flex justify-center h-[20rem] w-full bg-gray-300">
        <img src="{{asset('/images/'.$post->image)}} " alt=""
        class=" h-full">
    </div>
</div>