<div class=" p-3 flex flex-col w-full md:w-[30rem]  lg:w-[30rem] border rounded-xl bg-white hover:shadow">
    <div class="  flex justify-between items-center p-3">
        <div class=" flex  items-center gap-2">
            <div class=" h-[3rem] w-[3rem] rounded-full">
                <a href="{{route('profile.show',$post->user)}}">
                    <img src="{{asset('/images/avatar/'.$post->user->avatar)}}" alt=""
                    class=" rounded-full h-full w-full">
                </a>
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
    <div class=" py-3 flex justify-evenly">
        <a href="{{route('post.like',$post)}}" class=" flex gap-2  p-1 px-3 rounded-full 
        @if(auth()->user()->likes()->where('post_id',$post->id)->exists()) 
        bg-green-200
        @else
        border border-green-200
        @endif">
            <img class="icon" src="{{asset('icons/heart3.ico')}}" alt="">
            <span>{{ $post->likes()->count()}}</span>
        </a>
        <a href="" class=" flex gap-2 bg-red-200 p-1 px-3 rounded-full">
            <img class="icon" src="{{asset('icons/heart3.ico')}}" alt="">
            <span>123</span>
        </a>
        <a href="" class=" flex gap-2 bg-sky-200 p-1 px-3 rounded-full">
            <img class="icon" src="{{asset('icons/heart3.ico')}}" alt="">
            <span>123</span>

        </a>
    </div>
    <div>
        @include('comment.comment-submit')
    </div>

    @foreach ($post->comments as $comment)
        @include('comment.comment-section')
    @endforeach


</div>