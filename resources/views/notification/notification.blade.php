@extends('layouts.layout')

@section('content')

<div class=" flex mt-4 justify-between items-start gap-10">

    @include('layouts.sidebar-left')

    <div class=" flex-3 bg-white p-4 border rounded-xl">
        @if (count($data) > 0)
            @foreach ($data as $notif)
            <div class="">
                <a href="{{$notif['link']}}">{{ $notif['message']}}</a>
            </div>
            @endforeach
        @else
        <div class="">
            <p>You have no notification</p>
        </div>
        @endif
    </div>

    <div class=" min-w-[20rem]">

    </div>

</div>


@endsection