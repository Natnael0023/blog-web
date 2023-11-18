@extends('layouts.layout')

@push('scripts')
    <script src="{{ asset('js/menulinks.js')}}"></script>
@endpush


@section('content')

<div class=" flex mt-4 justify-between items-start gap-10">

@include('layouts.sidebar-left')

<div class=" flex-3">
    <x-feed.postlink/>

    {{-- pop up --}}
    @if (session('unauthorized'))
    <div x-data="{ open: {{ session()->has('unauthorized') ? 'true' : 'false' }} }" x-show="open" class="fixed inset-0 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 shadow-xl">
            <h2 class="text-lg text-red-400 font-medium">Unauthorized</h2>
            <p>{{ session('unauthorized') }}</p>
            <button @click="open = false" class="mt-4 px-4 py-2 bg-red-300 text-white rounded hover:bg-blue-600">Close</button>
        </div>
    </div>
    @php
    session()->forget('unauthorized');
    @endphp
    @endif

    @if (session('deleteSuccess'))
    <div x-data="{ open: {{ session()->has('deleteSuccess') ? 'true' : 'false' }} }" x-show="open" class="fixed inset-0 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 shadow-xl">
            <h2 class="text-lg text-red-400 font-medium">Success</h2>
            <p>{{ session('deleteSuccess') }}</p>
            <button @click="open = false" class="mt-4 px-4 py-2 bg-red-300 text-white rounded hover:bg-blue-600">Close</button>
        </div>
    </div>
    @php
    session()->forget('deleteSuccess');
    @endphp
    @endif
    {{-- {{-- //pop up --} --}}
   
    {{-- feeds --}}
    <div class=" flex flex-col gap-5 items-center mt-10 border border-red-500">
        {{-- post item --}}
        @if ('searchResults')
            @foreach ($posts as $post )
                {{-- <x-feed.post-item :post="$post"/> --}}
                @include('post.post-item')
            @endforeach
            {{$posts->links()}}

        @else
            @foreach ($posts as $post )
                {{-- <x-feed.post-item :post="$post"/> --}}
                @include('post.post-item')

            @endforeach
            {{$posts->links()}}
        @endif
        {{-- //post item --}}
    </div>
    {{-- //feeds --}}
</div>
    @include('layouts.sidebar-right')

@endsection