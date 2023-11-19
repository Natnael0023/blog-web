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

<body class="  px-3 md:px-32 lg:px-72 bg-bg">
    
    @include('layouts.-nav')

    {{-- popup --}}
    @if (session('error'))
    <div x-data="{ open: {{ session()->has('erorr') ? 'true' : 'false' }} }" x-show="open" class="fixed inset-0 flex z-50 items-center justify-end">
        <div class="bg-white rounded-lg p-6 shadow-xl">
            <h2 class="text-lg text-red-400 font-medium">Unauthorized</h2>
            <p>{{ session('unauthorized') }}</p>
            <button @click="open = false" class="mt-4 px-4 py-2 bg-blue-300 text-white rounded hover:bg-blue-600">Close</button>
        </div>
    </div>
    @php
    session()->forget('unauthorized');
    @endphp
    @endif

    @if (session('success'))
    <div x-data="{ open: {{ session()->has('success') ? 'true' : 'false' }} }" x-show="open" class="fixed inset-0 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 shadow-xl">
            <h2 class="text-lg text-blue-400 font-medium">Success</h2>
            <p>{{ session('success') }}</p>
            <button @click="open = false" class="mt-4 px-4 py-2 bg-blue-300 text-white rounded hover:bg-blue-600">Close</button>
        </div>
    </div>
    @php
    session()->forget('deleteSuccess');
    @endphp
    @endif
    {{-- end popup --}}

       <div class=" flex-3">
           @yield('content')
        </div>

@include('layouts.footer')

</body>
</html>