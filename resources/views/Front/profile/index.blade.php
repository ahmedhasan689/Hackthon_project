@extends('layouts.main-layout')

@section('page_title', 'الملف الشخصي')

@section('content')

    <x-inside-navbar />

    <div class="profile">
        <div class="head">
            <div class="cover">
                <div class="gg">
                    <div class="imgProfile">
                        <img src="{{ Auth::guard(session('guardName'))->user()->image }}" alt="">
                    </div>
                </div>

                <div class="edit">
                    @if (session('guardName') == 'web')
                        <h5>{{ Auth::user()->project_name }}</h5>
                    @endif
                    <p>{{ Auth::user()->name }}</p>
                </div>

                <div class="addRoad">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <a href="{{ route('product.create') }}">
                            اضافة منتج
                        </a>
                    </button>
                </div>
            </div>

            <br> <br> <br> <br> <br>

            @if (session('guardName') == 'web')
                <div class="test">
                    <div class="three " style="display: flex;">
                        <div class="rat"
                            style="background-color: rgb(255, 230, 0); color: #fff; display: flex; margin-left: 5px; padding: 5px; border-radius: 5px;">
                            <h5 style="padding-top: 5px;">التقييم:</h5>
                            <h5 style="padding-top: 5px; margin-right: 5px;">4.7</h5>
                        </div>
                        <div class="pro"
                            style="background-color: rgb(170, 34, 34); color: #fff; display: flex; margin-left: 5px; padding: 5px; border-radius: 5px;">
                            <h5 style="padding-top: 5px;">المنتجات:</h5>
                            <h5 style="padding-top: 5px; margin-right: 5px;">20</h5>
                        </div>
                        <div class="num"
                            style="background-color: rgb(175, 179, 179); color: #fff; display: flex; margin-left: 5px; padding: 5px; border-radius: 5px;">
                            <h5 style="padding-top: 5px;">المبيعات:</h5>
                            <h5 style="padding-top: 5px; margin-right: 5px;">70</h5>
                        </div>
                    </div>
                </div>
            @endif

            <br> <br> <br> <br> <br>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active product" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">المنتجات</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link control" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">لوحة التحكم</button>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
            </div>

            <div class="contentProfile mt-5">
                <div class="row pb-5 mb-4">
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-lg-0">
                        <!-- Card-->
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body p-0">
                                <div class="image">
                                    <img src="{{ asset('Front/img/3565c8776f2815755ecada82e48d6fdf.jpg') }}" alt=""
                                        class="w-100 card-img-top">
                                </div>
                                <div class="p-4 ">
                                    <h5 class="mb-0">كيكة عيد الميلاد</h5>
                                    <p class="small text-muted">50$</p>
                                    <div class="more">
                                        <button>
                                            <a href="productDetails.html">
                                                قراءة التفاصيل
                                            </a>
                                        </button>
                                        <div class="img">
                                            <a href="javascript:;">
                                                <div class="like">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </div>
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
                                    <img src="{{ asset('Front/img/3565c8776f2815755ecada82e48d6fdf.jpg') }}" alt=""
                                        class="w-100 card-img-top">
                                </div>
                                <div class="p-4 ">
                                    <h5 class="mb-0">كيكة عيد الميلاد</h5>
                                    <p class="small text-muted">50$</p>
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
                                    <img src="{{ asset('Front/img/3565c8776f2815755ecada82e48d6fdf.jpg') }}" alt=""
                                        class="w-100 card-img-top">
                                </div>
                                <div class="p-4 ">
                                    <h5 class="mb-0">كيكة عيد الميلاد</h5>
                                    <p class="small text-muted">50$</p>
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
                                    <img src="{{ asset('Front/img/3565c8776f2815755ecada82e48d6fdf.jpg') }}" alt=""
                                        class="w-100 card-img-top">
                                </div>
                                <div class="p-4 ">
                                    <h5 class="mb-0">كيكة عيد الميلاد</h5>
                                    <p class="small text-muted">50$</p>
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
                </div>
            </div>

            <div class="controlProfile " style="display: none;">
                <table>
                    <tr class="title">
                        <td>صورة المنتج</td>
                        <td>اسم المنتج</td>
                        <td>الكمية</td>
                        <td>المبيعات</td>
                        <td>متبقي</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="image">
                                <img src="img/bdad878ef10464b55d8a4c156c05f21b.jpg" alt="">
                            </div>
                        </td>
                        <td>كيكة عيد ميلاد</td>
                        <td class="change"><input id="editP1" type="text" value="2"><label for="editP1"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td class="change"><input id="editS1" type="text" value="2"><label for="editS1"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td class="change"><input id="editR1" type="text" value="2"><label for="editR1"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td><button class="save">حفظ</button></td>
                        <td><button class="delete">حذف</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="image">
                                <img src="img/bdad878ef10464b55d8a4c156c05f21b.jpg" alt="">
                            </div>
                        </td>
                        <td>كيكة عيد ميلاد</td>
                        <td class="change"><input id="editP2" type="text" value="2"><label for="editP2"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td class="change"><input id="editS2" type="text" value="2"><label for="editS2"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td class="change"><input id="editR2" type="text" value="2"><label for="editR2"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td><button class="save">حفظ </button></td>
                        <td><button class="delete">حذف</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="image">
                                <img src="img/bdad878ef10464b55d8a4c156c05f21b.jpg" alt="">
                            </div>
                        </td>
                        <td>كيكة عيد ميلاد</td>
                        <td class="change"><input id="editP3" type="text" value="2"><label for="editP3"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td class="change"><input id="editS3" type="text" value="2"><label for="editS3"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td class="change"><input id="editR3" type="text" value="2"><label for="editR3"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td><button class="save">حفظ</button> </td>
                        <td><button class="delete">حذف</button></td>
                    </tr>.
                    <tr>
                        <td>
                            <div class="image">
                                <img src="img/bdad878ef10464b55d8a4c156c05f21b.jpg" alt="">
                            </div>
                        </td>
                        <td>كيكة عيد ميلاد</td>
                        <td class="change"><input id="editP4" type="text" value="2"><label for="editP4"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td class="change"><input id="editS4" type="text" value="2"><label for="editS4"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td class="change"><input id="editR4" type="text" value="2"><label for="editR4"><i
                                    class="fa-solid fa-pen"></i></label> </td>
                        <td><button class="save">حفظ</button></td>
                        <td><button class="delete">حذف</button></td>
                    </tr>
                </table>
            </div>


        @endsection
