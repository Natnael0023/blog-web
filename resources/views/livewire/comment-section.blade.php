<div>
<div>
    <div class=" flex gap-1  px-3">
        <div class=" h-[2.5rem] w-[2.5rem] rounded-full border border-sky-200">
            <img src="{{asset('/images/avatar/'.auth()->user()->avatar)}}" alt=""
            class=" object-cover rounded-full h-full w-full">
        </div>
        <form wire:submit.prevent='addComment' class="">
            @csrf
            <div class="flex border border-gray-400 rounded-full">
                <input type="text" wire:model="newComment" class="w-full rounded-full border-none outline-0"  placeholder="write comment...">
                <button type="submit" wire:loading.attr="disabled" class=" p-2 ">
                    <span wire:loading wire:target="addComment" class="animate-spin">⏳</span>
                    <span wire:loading.remove>Go</span>
                </button>
                <input type="hidden" name="comment_form_{{ $post->id }}" value="1">
            </div>
        </form>
    </div>
</div>

<div class="flex flex-col px-3">
    @foreach ($comments as $comment)
    <div class="py-2 flex gap-2 justify-between">
        <div class=" h-[2.5rem] w-[2.5rem] rounded-full border border-sky-200">
            <img src="{{asset('/images/avatar/'.$comment->user->avatar)}}" alt=""
            class=" object-cover rounded-full h-full w-full">
        </div>
        <div class=" flex-1 flex flex-col rounded-r-xl rounded-bl-xl  bg-sky-50 p-2">
            <div class=" flex justify-between">
                <p class=" text-sm text-gray-600">
                    {{$comment->user->name}}
                </p>
                <div class=" flex space-x-2">
                    <p class=" text-sm text-gray-400">
                        {{$comment->created_at->diffForHumans()}}
                    </p>
                    @can('delete',$comment)
                    <form action="{{route('comment.detsroy',$comment)}}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit">
                          <img class="icon" src="{{asset('icons/delete.ico')}}" alt="">
                      </button>
                      </form>
                      @endcan
                  </div>
            </div>
        <p class="  text-sm">
                {{$comment->content}}
            </p>
        </div>
        
    </div>
    @endforeach

    @if ($comments->count() < $post->comments->count())
    <button wire:click="loadMoreComments"
    class=" text-gray-400 hover:text-gray-500">Load More</button>
    @else
    <button wire:click='collapse'>
        collapse</button>
    @endif
</div>
</div>