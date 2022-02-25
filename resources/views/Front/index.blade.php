@extends('layouts.main-layout')

@section('page_title', 'الرئيسية')

@section('content')

    <!-- Navbar Component -->
    <x-navbar />

    <div class="update">
        <h2 class="font-weight-bold mb-2">أحدث العروض</h2>
        <p>نعرض لك أحدث عروض البائعين</p>

        <div class="row pb-5 mb-4">
            @foreach ($offer_products as $offer_product)
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-lg-0">
                    <!-- Card-->
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-body p-0">
                            <div class="image">
                                <img src="{{ $offer_product->cover }}" alt=""
                                    class="w-100 card-img-top">
                            </div>
                            <div class="p-4 ">
                                <h5 class="mb-0">{{ $offer_product->name }}</h5>
                                <div class="over ">
                                    <p class="old">50$</p>
                                    <p class=" new">{{ $offer_product->price }}</p>
                                </div>

                                <div class="hint-star star">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="far fa-star" aria-hidden="true"></i>
                                </div>

                                <div class="more">
                                    <button>
                                        <a href="{{ route('product.show', $offer_product) }}">
                                            قراءة التفاصيل
                                        </a>
                                    </button>
                                    <div class="img">
                                        <a href="javascript:;">
                                            <div class="like">
                                                <i class="fa fa-heart" style="" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                        <div class="img-content"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <div class="image">
                            <img src="img/3565c8776f2815755ecada82e48d6fdf.jpg" alt="" class="w-100 card-img-top">
                        </div>
                        <div class="p-4 ">
                            <h5 class="mb-0">كيكة عيد الميلاد</h5>
                            <div class="over ">
                                <p class="old">50$</p>
                                <p class=" new">30$</p>

                            </div>
                            <div class="hint-star star">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="far fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="more">
                                <button><a href="productDetails.html">قراءة التفاصيل</a></button>
                                <div class="img">
                                    <a href="javascript:;">
                                        <div class="like"><i class="fa fa-heart" style=""
                                                aria-hidden="true"></i></div>
                                    </a>
                                    <div class="img-content"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <div class="image">
                            <img src="img/3565c8776f2815755ecada82e48d6fdf.jpg" alt="" class="w-100 card-img-top">
                        </div>
                        <div class="p-4 ">
                            <h5 class="mb-0">كيكة عيد الميلاد</h5>
                            <div class="over ">
                                <p class="old">50$</p>
                                <p class=" new">30$</p>

                            </div>
                            <div class="hint-star star">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="far fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="more">
                                <button><a href="productDetails.html">قراءة التفاصيل</a></button>
                                <div class="img">
                                    <a href="javascript:;">
                                        <div class="like"><i class="fa fa-heart" style=""
                                                aria-hidden="true"></i></div>
                                    </a>
                                    <div class="img-content"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <div class="image">
                            <img src="img/3565c8776f2815755ecada82e48d6fdf.jpg" alt="" class="w-100 card-img-top">
                        </div>
                        <div class="p-4 ">
                            <h5 class="mb-0">كيكة عيد الميلاد</h5>
                            <div class="over ">
                                <p class="old">50$</p>
                                <p class=" new">30$</p>

                            </div>

                            <div class="hint-star star">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="far fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="more">
                                <button><a href="productDetails.html">قراءة التفاصيل</a></button>
                                <div class="img">
                                    <a href="javascript:;">
                                        <div class="like"><i class="fa fa-heart" style=""
                                                aria-hidden="true"></i></div>
                                    </a>
                                    <div class="img-content"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>



@endsection
