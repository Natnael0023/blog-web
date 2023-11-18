<hr/>

<div class="py-2 flex gap-2 justify-between">
        <div class=" h-[3rem] w-[3rem] rounded-full">
            <img src="{{asset('/images/avatar/'.$comment->user->avatar)}}" alt=""
            class=" rounded-full h-full w-full">
        </div>
        <div class=" flex-1 flex justify-between  bg-gray-200 rounded-l px-2">
            <p>
                {{$comment->content}}
            </p>
            <p class=" text-sm text-gray-400">
                {{$comment->created_at}}
            </p>
        </div>
        <div class=" ">
          <form action="{{route('comment.detsroy',$comment)}}" method="post">
            @method('delete')
            @csrf
            <button type="submit">
                <img class="icon" src="{{asset('icons/delete.ico')}}" alt="">
            </button>
            </form>
        </div>
</div>