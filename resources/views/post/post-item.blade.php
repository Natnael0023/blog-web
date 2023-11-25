<div class="  flex flex-col w-full md:w-[30rem]  lg:w-[30rem] border rounded-xl bg-white hover:shadow">
    <div class="  flex justify-between items-center p-3">
        <div class=" flex  items-center gap-2">
            <div class=" w-[3rem] h-[3rem]  rounded-full">
                <a href="{{route('profile.show',$post->user)}}">
                    <img src="{{asset('/images/avatar/'.$post->user->avatar)}}" alt=""
                    class=" object-cover rounded-full h-full w-full border-2 border-sky-200">
                </a>
            </div>
            <div>
                <p>
                    {{$post->user->name}}  
                  </p>
                  <p
                      class=" text-gray-400 text-sm">
                      {{ \Carbon\Carbon::parse($post->created_at)->format(' D H:i')}} -
                      {{$post->created_at->diffForHumans()}}
                </p>
            </div>
        </div>
        {{-- edit & delete --}}
        @can('update',$post)
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
       @endcan
        {{-- //edit & delete --}}
    </div>
    <div class=" px-3">
        <div class=" flex items-center justify-between">
            <h2 class="">
               {{$post->title}}
            </h2>
        </div>
        <p class=" text-gray-500 text-sm">
            {{$post->text}}
        </p>
    </div>
    <div class='mt-2 flex justify-center h-[20rem] w-full rounded-md bg-blue-50 '>
        <img src="{{asset('/images/'.$post->image)}} " alt=""
        class=" object-center h-full rounded-md">
    </div>
        {{-- like --}} 
        @livewire('like-button',['post'=>$post], key($post->id))

        @livewire('comment-section',['post'=>$post])
</div>