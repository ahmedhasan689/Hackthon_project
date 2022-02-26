@extends('layouts.main-layout')

@section('page_title', 'السلة الشرائية')

@section('content')

    <x-inside-navbar />

    <div class="cart">


        <h2>سلتك الشرائية</h2>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">المنتج</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">المجموع</th>
                            {{-- <th scope="col"></th> --}}
                        </tr>
                    </thead>
                    @foreach ($carts as $cart)
                        <tbody>
                            <tr>
                                <td>
                                    <div class="all d-flex">
                                        <div class="image">
                                            <img src="{{ $cart->product->cover }}" alt="">
                                        </div>
                                        <h5>{{ $cart->product->name }}</h5>
                                    </div>
                                </td>
                                <td>{{ $cart->product->price }}$</td>
                                <td>
                                    <div class="cuantity">
                                        <div class="cont">
                                            <span class="up" onclick="incrementValue()">+</span>
                                            <input type="text" id="number" value="{{ $cart->quantity }}">
                                            <span class="down" onclick="decreaseValue()">-</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $cart->quantity * $cart->product->price }}$</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>



        </div>
        <div class="review d-flex">
            <h5>المجموع العام :</h5>
            <h5 class="priceAll">{{ $total }}$</h5>
        </div>
        <div class="check text-center">
            <button>
                <a href="{{ route('checkout') }}" style="color:#FFF; text-decoration:none">
                    اقبل
                </a>
            </button>
        </div>

    </div>

@endsection
