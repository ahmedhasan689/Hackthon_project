{{--
<head>
    <link rel="stylesheet" href="{{ asset('Front/css/style.css') }}">
</head>
--}}

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="cont">
        <a class="navbar-brand" href="#">طلبات</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('home') }}">الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="event.html">المنتجات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="event.html">عن الموقع</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="instruct.html">تواصل معنا</a>
                </li>

            </ul>

        </div>

        <div class="both d-flex">
            <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>

            @auth(session('guardName'))
                <div class="dropdown">
                    <div class="profile" class=" dropdown-toggle" type="button" id="dropdownMenu2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::guard(session('guardName'))->user()->image }}" alt="" style="width: 40px;
                        height: 40px;
                        border-radius: 50%;
                        overflow: hidden;
                        position: relative;">
                    </div>

                    <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenu2" style="margin-left: -50px;">

                        <li class="text-center">
                            <button class="dropdown-item" type="button">
                                <a href="{{ route('profile.index') }}">
                                    البروفايل
                                </a>
                            </button>
                        </li>

                        <li class="text-center">
                            <button class="dropdown-item" type="button">
                                <a href="{{ route('profile.edit', Auth::guard(session('guardName'))->user()->id) }}">
                                    تعديل البروفايل
                                </a>
                            </button>
                        </li>

                        <li class="text-center">
                            <button class="dropdown-item" type="button">
                                <a href="#">
                                    مساعدة
                                </a>
                            </button>
                        </li>

                        <form class="d-flex" id="logout-form" action="{{ route('logout', session('guardName')) }}"
                            method="POST">
                            @csrf
                            @method('POST')
                            <li class="text-center">
                                <button class="dropdown-item" type="submit">
                                    تسجيل الخروج
                                </button>
                            </li>
                        </form>
                    </ul>
                </div>
            @endauth


            <form class="d-flex">
                @guest(session('guardName'))
                    <button type="button" class="btn btn-primary log" data-bs-toggle="modal" data-bs-target="#login">
                        <a>
                            تسجيل الدخول
                        </a>

                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        تسجيل
                    </button>
                @endguest
            </form>
        </div>

    </div>
</nav>
