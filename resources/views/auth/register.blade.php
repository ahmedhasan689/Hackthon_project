@extends('layouts.main-layout')

@section('page_title', 'التسجيل')

@section('content')

<!-- signIn -->
<div class="sign ">
    <div class="row">
        <div class="col-lg-4 rightLogin">
            <div class="cont text-center">
                <h2>مرحبا بعودتك</h2>
                <p>
                    للبقاء على اتصال معنا
                </p>
                <p>تسجيل الدخول بالمعلومات الشخصية</p>
                <button class="btn">
                    <a href="">
                        تسجيل الدخول
                    </a>
                </button>
            </div>
        </div>
        <div class="col-lg-8 ">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" style="color: red;" />
            <div class="container text-center">

                <form action="{{ route('register') }}" method="POST" style="margin-top: 60px">
                    @csrf

                    <h2>تسجيل</h2>

                    <!-- Hidden Input For Type -->
                    <input type="hidden" name="type" value="{{ $type }}">

                    <!-- Name -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="الاسم بالكامل" aria-label="name" aria-describedby="basic-addon1" name="name">
                    </div>

                    <!-- Age -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="العمر" aria-label="name" aria-describedby="basic-addon1" name="age">
                    </div>

                    <!-- Job & Category -->
                    <div class="input-group mb-3">
                        @if ($type == 'user')
                        <select class="form-select s1" aria-label="Default select" name="category">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ __($category->category_name) }}</option>
                            @endforeach
                        </select>
                        @endif

                        <!-- City -->
                        <select class="form-select s2" aria-label="Default select" name="city">
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ __($city->city_name) }}</option>
                            @endforeach
                        </select>

                    </div>

                    @if ($type == 'user')
                    <!-- Job -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="الوظيفة" aria-label="name" aria-describedby="basic-addon1" name="job">
                    </div>

                    <!-- Project_name -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="اسم المشروع" aria-label="name" aria-describedby="basic-addon1" name="project_name">
                    </div>
                    @endif

                    @if ($type == 'customer')
                    <!-- Job -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="العنوان" aria-label="name" aria-describedby="basic-addon1" name="address">
                    </div>
                    @endif


                    <!-- Email -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="الإيميل" aria-label="name" aria-describedby="basic-addon1" name="email">
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="رقم الجوال" aria-label="phone" aria-describedby="basic-addon1" name="phone_number">
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="كلمة السر" aria-label="password" aria-describedby="basic-addon1" name="password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="أعد كتابة كلمة السر" aria-label="password" aria-describedby="basic-addon1">
                    </div>
                    <br>
                    <div class="text-center">
                        <button class="btn" type="submit">
                            تسجيل
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>



@endsection