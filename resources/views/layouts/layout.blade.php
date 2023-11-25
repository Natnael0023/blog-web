<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.4.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <title> @yield('title') | {{config('app.name')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body >
    
@include('layouts.-nav')

<div class=" px-3 md:px-32 lg:px-80 bg-[#f6f3ee]">

    {{-- popup --}}
    @include('shared.success-flash')
    {{-- end popup --}}

       <div class=" flex-3 border border-transparent">
           @yield('content')
        </div>

@include('layouts.footer')

</div>
</body>
</html>
