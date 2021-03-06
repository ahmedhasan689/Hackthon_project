<div class="header">
    {{-- @dd(Auth::user()->profile->id) --}}
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="cont">
            <a class="navbar-brand" href="#">طلبات</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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

            @auth(session('guardName'))
                <form class="d-flex" id="logout-form" action="{{ route('logout', session('guardName')) }}"
                    method="POST">
                    @csrf
                    @method('POST')

                    <div class="dropdown">
                        <div class="profile" class=" dropdown-toggle" type="button" id="dropdownMenu2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::guard(session('guardName'))->user()->image }}" alt="">
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
                                    <a
                                        href="{{ route('profile.edit', Auth::guard(session('guardName'))->user()->id) }}">
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

                            <li class="text-center">
                                <button class="dropdown-item" type="submit">
                                    تسجيل الخروج
                                </button>
                            </li>
                        </ul>
                    </div>

                </form>
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
    </nav>

    <div class="row">
        <div class="col-lg-6">
            <h1>تسوق من مكانك</h1>
            <p>ابحث عن كل ما تحتاجه , وانتظر أن يصلك في بيتك</p>
            <div class="search p-0">
                <input type="text" placeholder="ابحث">
                <button>ابحث</button>

            </div>


        </div>
        <div class="col-lg-6 left">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('Front/img/bdad878ef10464b55d8a4c156c05f21b.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('Front/img/bdad878ef10464b55d8a4c156c05f21b.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('Front/img/bdad878ef10464b55d8a4c156c05f21b.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
