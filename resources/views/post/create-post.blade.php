<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class=" px-60">
    <x-homepage.-nav/>

    <div class=" mt-10 border border-red-400 flex flex-col gap-5">
        <h1 class=" text-2xl">Create Post</h1>

        <form action="{{route('post.store')}}" enctype="multipart/form-data" method="post"
        class=" flex flex-col gap-3">
            @csrf
            @method('post')
                <div>
                    <h1>Title</h1>
                    <input type="text" name="title" id="" required
                    class=" rounded-xl">
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
</body>
</html>