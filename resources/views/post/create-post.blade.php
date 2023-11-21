@extends('layouts.layout')

@section('content')

    <div class=" mt-10 border border-red-400 flex flex-col gap-5">
        <h1 class=" text-2xl">Create Post</h1>

        <form action="{{route('post.store')}}" enctype="multipart/form-data" method="post"
        class=" flex flex-col gap-3">
            @csrf
            @method('post')
                <div class="flex flex-col items-start">
                    <h1>Title <span class="text-red-500">*</span></h1>
                    <input type="text" name="title" id="" 
                    class=" rounded-xl"> 
                        @error('title')
                            <span class=" text-red-500">{{$message}}</span>
                        @enderror
                </div>
                <div>
                    <h1>Text</h1>
                    <textarea name="text" id="" " rows="10"></textarea>
                </div>
                <div>
                    <h1>Attach Image</h1>
                    <input type="file" name="image">
                </div>
                <div>
                    <input type="submit" name="" value="Post" id=""
                    class=" bg-black text-white cursor-pointer px-7 p-2 hover:shadow">
                </div>
        </form>
    </div>

    @endsection