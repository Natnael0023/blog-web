@extends('layouts.layout')

@section('title','Feed')


@section('content')

<div class=" flex mt-4 justify-between items-start gap-10">

@include('layouts.sidebar-left')

<div class=" flex-3">
    <x-feed.postlink/>
   
    {{-- feeds --}}
    <div class=" border border-red-400 flex flex-col gap-5 items-center mt-10 ">
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