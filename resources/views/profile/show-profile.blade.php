@extends('layouts.layout')

@section('content')

<div class=" flex mt-4 justify-between items-start gap-10">

@include('layouts.sidebar-left')

<div class=" flex flex-col items-center gap-5 ">
    {{-- profile --}}
    <div class=" flex-4 flex flex-col bg-white rounded-xl border">
        <div class="min-w-[40rem] min-h-[10rem] bg-gray-300 rounded"></div>
        <div class=" flex justify-center">
            <div class="   absolute top-[12%] w-[14rem] h-[14rem] bg-blue-300 rounded-full">
                <img src="{{asset('images/avatar/'.$user->avatar)}}" alt="{{$user->name}}"
                class=" h-full w-full text-center text-3xl  rounded-full">
            </div>
        </div>
        <div class=" flex flex-col gap-3 min-w-[40rem] pb-5 ">
            <div class="  flex flex-col items-center justify-center gap-2 mt-20">
                <h1 class="text-3xl font-bold">{{$user->name}}</h1>
                 <p class="text-lg">Fullstack Developer</p>
                 @if(auth()->user()->id !== $user->id)
                <a href="{{route('user.follow',$user)}}" class="px-6 py-2 mt-4 bg-blue-500 text-white rounded-full font-bold">
                    @if(auth()->user()->isFollowerOf($user->id))
                        UNFOLLOW
                    @else
                        FOLLOW
                    @endif
                </a>
                @endif
            </div>
            <div class=" flex justify-center gap-8">
                <p class=" flex text-gray-500"> 
                    <img class="icon" src="{{asset('icons/follower.ico')}}" alt="">
                    <span>{{$user->followers()->count()}} followers</span>
                </p>
                <p class=" flex text-gray-500"> 
                    <img class="icon" src="{{asset('icons/blog.ico')}}" alt="">
                    <span>{{ $postsByUser->count()}} blogs</span>
                </p>
            </div>
        </div>
    </div>
    {{-- end profile --}}

    <div class=" w-full bg-gray-300 h-[1px] mt-5 mb-5"></div>
    {{-- posts by user --}}
    <div>
        @if(count($postsByUser) > 0)
            <h1 id="blog-header" class=" text-center text-xl mb-4  text-black rounded py-2 sticky top-20 z-50">Blogs by {{ $user->name }}</h1>
            @foreach ($postsByUser as $post)
                @include('post.post-item')
            @endforeach
        @else
            <div>
                <h1>{{ $user->name }} hasn't blogged yet!</h1>
            </div>
        @endif
    </div>
</div>

@include('layouts.sidebar-right')

@endsection

<script>
    window.addEventListener('scroll', function(){
        var header = document.getElementById('blog-header');
        if(window.pageYOffset > 300) {
            header.classList.add('bg-blue-500','text-white','transition-colors','duration-500')
        }
        else {
            header.classList.remove('bg-blue-500','text-white')
        }
    })
</script>

