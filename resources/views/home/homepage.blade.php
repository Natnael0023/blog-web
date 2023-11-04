@extends('layouts.layout')

@section('content')

    @vite('resources/css/app.css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <x-homepage.banner quote="Find out who you are, and do it on purpose."/>
    <x-homepage.services/>
    <x-homepage.about/>
    <x-homepage.whychooseus/>

@endsection