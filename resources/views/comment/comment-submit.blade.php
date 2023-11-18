<div class="rounded-full">
    <form action="{{ route('comment.store', $post) }}" method="POST" class="flex flex-col w-full">
        @csrf
        <div class="flex">
            <input type="text" name="content" class="w-full rounded-full" placeholder="write comment...">
            <input type="submit" value="Go" class="bg-black text-white px-3 cursor-pointer rounded-full">
            <input type="hidden" name="comment_form_{{ $post->id }}" value="1">
        </div>
        {{-- @error('content')
            @if (request()->get('comment_form_' . $post->id))
                <span class="text-red-500">{{ $errors->first('content') }}</span>
                <p>{{$message}} </p>
            @endif
        @enderror --}}
    </form>
</div>