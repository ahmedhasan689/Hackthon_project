@extends('layouts.main-layout')

@section('page_title', 'البيانات')

@section('content')

    <x-inside-navbar />

    <div class="row">
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="col-md-9">

                <div class="addWork">
                    <div class="add">
                        <h4>أضف بيانات الفاتورة</h4>

                        <input type="hidden" name="customer" value="{{ $customer->id }}">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">الاسم</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="billing_name">
                        </div>
                        {{-- <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">فئة المنتج</label> <br>
                            <select name="" id="">
                                <option value="">المواد الغذائية</option>
                            </select>

                        </div> --}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">رقم الجوال</label>
                            <input type="text" class="form-control" id="exampleInputquant" aria-describedby="quant"
                                name="billing_phone">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">البريد الالكتروني</label>
                            <input type="text" class="form-control" id="exampleInputquant" aria-describedby="quant"
                                name="billing_email">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">المدينة</label> <br>
                            <select name="city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPrice" class="form-label">العنوان</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="billing_address">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ملاحظات</label> <br>
                            <textarea cols="50" rows="5" name="notes"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12" style="text-align: center; margin-top: 88px">
                <div class="ps-checkout__order">
                    <header>
                        <h3>Your Order</h3>
                    </header>
                    <div class="content">
                        <table class="table ps-checkout__products">
                            <thead>
                                <tr>
                                    <th class="text-uppercase">Product</th>
                                    <th class="text-uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->all() as $item)
                                    <tr>
                                        <td>{{ $item->product->name }} x {{ $item->quantity }}</td>
                                        <td>${{ $item->product->price * $item->quantity }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Order Total</td>
                                    <td>${{ $cart->total() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3>نظام الدفع</h3>
                    <div class="form-group cheque">
                        <div class="ps-radio">
                            <input class="form-check-input" type="radio">
                            <label for="rdo01">أختار نظام الدفع</label>
                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County,
                                Store Postcode.</p>
                        </div>
                    </div>
                    <div class="form-group paypal">
                        <div class="ps-radio ps-radio--inline">
                            <input class="form-check-input" type="radio">
                            <label for="rdo02">Paypal</label>
                        </div>
                        <ul class="ps-payment-method">
                            <li><a href="#"><img src="{{ asset('Front/img/1.png') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('Front/img/2.png') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('Front/img/3.png') }}" alt=""></a></li>
                        </ul>
                        <button type="submit" class="ps-btn ps-btn--fullwidth">
                            تأكيد الطلب
                            <i class="ps-icon-next"></i>
                        </button>
                    </div>

                </div>

            </div>
        </form>
    </div>

@endsection
