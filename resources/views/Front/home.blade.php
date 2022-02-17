@extends('layouts.main-layout')

@section('page_title', 'الرئيسية')

@extends('layouts.navbar')

@section ('content')

    @auth
    <h1>
        Ahmed
    </h1>
    @endauth

@endsection