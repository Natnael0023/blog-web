<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.4.2/dist/alpine.min.js" defer></script>
    <title>Document</title>
</head>
<body class=" px-3 md:px-32 lg:px-60 bg-gray-100">
    <H1>Feed</H1>
    <x-homepage.-nav/>
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
                <x-feed.post-item :post="$post"/>
            @endforeach
        @else
            @foreach ($posts as $post )
                <x-feed.post-item :post="$post"/>
            @endforeach
        @endif
        {{-- //post item --}}
    </div>
    {{-- //feeds --}}

    <x-footer/>
</body>
</html>