@extends('layouts.main-layout')

@section('page_title', 'تفاصيل المنتج')

@section('content')

    <x-inside-navbar />


    <div class="productDetail">
        <form action="{{ route('cart.store') }}" method="POST">
            @csrf

            <input type="hidden" value="{{ $product->id }}" name="product_id">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image">
                        <img src="{{ $product->cover }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <br>
                    <h4>{{ $product->name }} </h4>
                    <h3 class="price">{{ $product->price }}$</h3>
                    <p>
                        {{ $product->description }}
                    </p>
                    <div class="hint-star star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="far fa-star" aria-hidden="true"></i>
                    </div>

                    <div class="cuantity">
                        <h6>الكمية ( {{ $product->quantity }} )</h6>
                        <input type="hidden" name="" id="quantity" value="{{ $product->quantity }}">
                        <div class="cont">
                            <span class="up" onclick="incrementValue()">+</span>
                            <input type="text" id="number" name="quantity" value="0">
                            <span class="down" onclick="decreaseValue()">-</span>
                        </div>
                    </div>

                    <div class="add">

                        <button type="submit">
                            اضف الى السلة
                        </button>

                        <div class="img">
                            <a href="javascript:;">
                                <div class="like"><i class="fa fa-heart" style="" aria-hidden="true"></i></div>
                            </a>
                            <div class="img-content"></div>
                        </div>

                    </div>

                </div>
            </div>
        </form>

        <div class="comment">
            <div class="comm">
                <h2>التعليقات</h2>
                <div class="inp">
                    <input type="text" placeholder="ادخل تعليقك">
                    <button>ارسل</button>
                </div>
                <div class="row">
                    <div class="col-1">
                        <div class="image">
                            <img src="img/avtar.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-11">
                        <h5>سارة أحمد</h5>
                        <p>أنصح به</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <div class="image">
                            <img src="img/avtar.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-11">
                        <h5>سارة أحمد</h5>
                        <p>أنصح به</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <div class="image">
                            <img src="img/avtar.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-11">
                        <h5>سارة أحمد</h5>
                        <p>أنصح به</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
