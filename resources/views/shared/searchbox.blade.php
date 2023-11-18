<div>
    <form method="get" action="{{route('home')}}">
        @method('get')
        @csrf
        <div class=" flex rounded-xl bg-gray-200 border border-gray-400">
            <input type="text" name="keyword" placeholder="search blogs..."
            class=" rounded-l-xl border-none bg-transparent">
            <button type="submit"
            class=" px-4">
                <img class="icon" src="{{asset('icons/search.ico')}}" alt="">
            </button>
        </div>
    </form>
</div>