@extends('layouts.layout')

@section('title',$user->name)


@section('content')

<div class=" flex mt-4 justify-between items-start gap-10">

@include('layouts.sidebar-left')


<div class=" flex flex-col items-center gap-5 " x-data="{isEditModalOpen: false}">
    {{-- profile --}}
    <div class=" flex-4 flex flex-col gap-3 bg-white rounded-xl border">
        <div class="min-w-[40rem] min-h-[10rem] bg-gray-300 rounded"></div>
        <div class=" flex justify-center">
            <div class="   absolute top-[12%] w-[14rem] h-[14rem] bg-blue-300 rounded-full">
                <img src="{{asset('images/avatar/'.$user->avatar)}}" alt="{{$user->name}}"
                class=" h-full w-full text-center text-3xl  rounded-full object-cover">
            </div>
        </div>
        <div class=" flex flex-col gap-3 items-center min-w-[40rem] pb-5 ">
            <div class="  flex flex-col items-center justify-center gap-2 mt-20">
                <h1 class="text-3xl font-bold">{{$user->name}}</h1>
                 <p class="text-lg">Fullstack Developer</p>
                 @if(auth()->user()->isNot($user))
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
            @can('update',$user)
                <button x-on:click="isEditModalOpen = true" class=" bg-blue-500 text-white p-2 px-4 rounded-xl">Edit</button>
            @endcan
        </div>
    </div>
    {{-- end profile --}}
    <x-feed.postlink/>
    <div class=" w-full bg-gray-300 h-[1px] mt-5 mb-5" ></div>
    {{-- posts by user --}}
    <div>
        @if(count($postsByUser) > 0)
            <h1 id="blog-header" class=" text-center text-xl mb-4  text-black rounded py-2 sticky top-20 z-10">Blogs by {{ $user->name }}</h1>
            @foreach ($postsByUser as $post)
                @include('post.post-item')
            @endforeach
        @else
            <div>
                <h1>{{ $user->name }} hasn't blogged yet!</h1>
            </div>
        @endif
    </div>

    {{-- edit profile modal --}}
    <div x-show="isEditModalOpen" class="modal m-auto  bg-[#00000043] flex justify-center items-center fixed inset-0 z-50  " role="dialog" tabindex="-1"  x-cloak  x-on:click.away="isEditModalOpen = false">
        <div class="modal-content bg-white opacity-100 z-50 rounded-xl  p-4 ">
            <div class=" flex justify-between items-center">
                <h2>Edit Profile</h2>
                <button x-on:click="isEditModalOpen = false" class=" bg-black p-2 px-4 rounded-full text-white">X</button>
            </div>
            <form action="{{route('profile.update',$user)}}" enctype="multipart/form-data" method="POST" class="flex flex-col items-center gap-5">
                @csrf
                @method('put')
                <div class=" flex-4 flex flex-col bg-white rounded-xl border">
                    <div class=" flex justify-center">
                        <div class="  top-[12%] w-[7rem] h-[7rem] bg-blue-300 rounded-full">
                            <img src="{{asset('images/avatar/'.$user->avatar)}}" alt="{{$user->name}}"
                            class=" object-cover h-full w-full text-center text-3xl  rounded-full">
                        </div>
                    </div>
                    
                    <div class=" flex flex-col gap-3 min-w-[40rem] pb-5 ">
                        <div class="  flex flex-col items-center justify-center gap-2 mt-2">
                            <div>
                                <input type="file" name="avatar">
                            </div>
                            <input type="text" value="{{$user->name}}" name="name"
                            class=" rounded">
                            @error('name')
                                <span class=" text-red-500">{{ $message }}</span>
                            @enderror
                             <p class="text-lg">Fullstack Developer</p>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="submit" value="UPDATE"  id="" class=" bg-blue-500 p-2 px-4 rounded-xl text-white" >
                </div>
            </form>

        </div>
    </div>
    {{-- end edit profile modal--}}

</div>
  


@include('layouts.sidebar-right')

</div>

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

