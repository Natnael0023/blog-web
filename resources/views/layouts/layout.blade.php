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

@include('layouts.-nav')

<div>
    {{-- content goes here --}}
    @yield('content')
</div>

@include('layouts.footer')

</body>
</html>