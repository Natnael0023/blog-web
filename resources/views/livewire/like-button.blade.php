<div class=" py-3 flex justify-evenly">
    <button wire:click='like' class=" flex gap-2  p-1 px-3 rounded-full 
    @if(auth()->user()->likes()->where('post_id',$post->id)->exists()) 
    bg-green-200 border border-green-200
    @else
    border
    @endif">
        <img class="icon" src="{{asset('icons/heart3.ico')}}" alt="">
        <span>{{ $post->likes_count}}</span>
</button>
    {{-- <a href="" class=" flex gap-2 bg-red-200 p-1 px-3 rounded-full">
        <img class="icon" src="{{asset('icons/heart3.ico')}}" alt="">
        <span>123</span>
    </a>
    <a href="" class=" flex gap-2 bg-sky-200 p-1 px-3 rounded-full">
        <img class="icon" src="{{asset('icons/heart3.ico')}}" alt="">
        <span>123</span>
    </a> --}}
</div>
