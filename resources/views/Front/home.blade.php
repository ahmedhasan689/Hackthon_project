@extends('layouts.main-layout')

@section('page_title', 'الرئيسية')

@section('content')

    <!-- Navbar Component -->
    <x-navbar />
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
                        <img src="img/bdad878ef10464b55d8a4c156c05f21b.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/bdad878ef10464b55d8a4c156c05f21b.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/bdad878ef10464b55d8a4c156c05f21b.jpg" class="d-block w-100" alt="...">
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



@endsection
