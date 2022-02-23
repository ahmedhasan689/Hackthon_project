@extends('layouts.main-layout')

@section('page_title', "الملف الشخصي")

@section('content')

    {{-- <x-inside-navbar /> --}}

    <h1>
       {{ Auth::user()->name }}
    </h1>


@endsection
