@extends('layouts.main-layout')

@section('page_title', 'الرئيسية')

@section ('content')
    
    <!-- Navbar Component -->
    <x-navbar />
    
    @auth
    <h1>
        Ahmed
    </h1>
    @endauth

@endsection