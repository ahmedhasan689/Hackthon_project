    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="cont">
            <a class="navbar-brand" href="#">طلبات</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.html">الصفحة الرئيسية</a>
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
            <form class="d-flex">

                @auth
                <h1>
                    welcome {{ auth()->user()->name }}
                </h1>
                @endauth

                @guest
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