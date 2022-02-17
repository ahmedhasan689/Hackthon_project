@extends('layouts.main-layout')
<!-- Login -->
<div class="login sign">
    <div class="row">

        <div class="col-lg-4 rightLogin">
            <div class="cont text-center">
                <h2>مرحبا , أصدقائنا</h2>
                <p>
                    ادخل معلوماتك الشخصية وابدأ رحلتك معنا
                </p>
                <button class="btn">
                    <a href="">
                        تسجيل
                    </a>
                </button>
            </div>
        </div>

        <div class="col-lg-8 ">
            <div class="container text-center">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <h2>تسجيل الدخول</h2>
                    <input type="hidden" name="type" value="{{ $type }}">

                    <div class="input-group mb-3">

                        <input type="text" class="form-control" placeholder="رقم الجوال " aria-label="phone" aria-describedby="basic-addon1" name="phone_number">
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="كلمة السر" aria-label="Username" aria-describedby="basic-addon1" name="password">
                    </div>
                    <br>

                    <a href="">
                        نسيت كلمة المرور؟
                    </a>

                    <div class="text-center">
                        <button type="submit" class="btn">
                            تسجيل الدخول
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>