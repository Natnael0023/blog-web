<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class=" px-3 md:px-20 lg:px-56">
    <x-homepage.-nav/>
    <x-homepage.banner quote="Find out who you are, and do it on purpose."/>
    <x-homepage.services/>
    <x-homepage.about/>
    <x-homepage.whychooseus/>
    <x-homepage.footer/>
</body>
</html>