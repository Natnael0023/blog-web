@extends('layouts.layout')

@section('content')

    <div class=" mt-10 border border-red-400 flex flex-col gap-5">
        <h1 class=" text-2xl">Edit Post</h1>

        <form method="post" enctype="multipart/form-data" action='{{route('post.update', ['post' => $post])}}' 
            class=" w-full lg:w-[60rem] md:w-[50rem] mx-auto flex gap-5 mt-4 items-center"
            >
            @csrf
            @method('put')
           
            <div class="  flex-1">
                    <legend class=" text-gray-400 italic"> post details </legend>
                    <div class=" flex flex-col justify-between">
                        <label for="">Title</label>
                        <input type="text" value="{{$post->title}} " name="title" placeholder="" autocomplete="off"
                        class=" p-2 focus: rounded-xl border">
                    </div>
                   
                    <div class=" flex flex-col justify-between">
                        <label for="">Text </label>
                        <textarea  type="text" rows="7" name="text" placeholder="runner shoes" autocomplete="off"
                            class=" p-2 focus: rounded-xl border">{{$post->text}}</textarea>
                    </div>
                    <div class=" flex flex-col justify-between">
                        <input type="submit" name="submit" value="Update"
                        class=" w-full bg-black text-white py-3 rounded-full font-semibold text-xl" >
                    </div>
            </div>

            <div class=" flex-1">
                <div class=" flex-1 flex flex-col ">
                    <div class=" flex flex-col  max-w-[400px] max-h-[400px] justify-between overflow-hidden rounded-xl"> 
                        <img src="{{asset('images/'.$post->image)}}" width="" type="file" name="existingImg"
                        class="flex-1 flex items-center border rounded-xl">
                    </div>

                    <div class=" flex flex-col justify-between"> 
                        <label for="">Change Image </label>
                        <input type="file" name="image"
                        class=" p-2 border rounded-xl">
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection