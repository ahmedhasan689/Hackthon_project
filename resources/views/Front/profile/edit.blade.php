@extends('layouts.main-layout')

@section('page_title', 'تعديل الملف الشخصي')

@section('content')

    <x-inside-navbar />


    <div class="editProfile">

        <form action="{{ route('profile.update', Auth::user()->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <a href="#">
                <div class="image mb-5">
                    {{-- <img src="img/avtar.jpg" alt=""> --}}

                    <div class="image-upload">
                        <label for="file-input">
                            <i class="fas fa-camera"></i>
                            <img id="output" src="{{ asset('Front/img/avtar.jpg') }}" alt="">
                        </label>
                        <input id="file-input" onchange="loadFile(event)" type="file" name="avatar" />
                    </div>
                </div>
            </a>

            {{-- @php
                $guard = session('guardName');
            @endphp --}}

            <div class=" mb-3">
                <label for="exampleInputName" class="form-label">اسم المستخدم</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp"
                    value="{{ $profile->name }}" name="name">
            </div>

            @if (session('guardName') == 'web')
                <div class=" mb-3">
                    <label for="exampleInputName" class="form-label">اسم المشروع</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp"
                        value="{{ $profile->project_name }}" name="project_name">
                </div>
            @endif

            <div class=" mb-3">
                <label for="exampleInputPassword1" class="form-label">رقم الجوال</label>
                <input type="text" class="form-control" value="{{ $profile->phone_number }}" id="exampleInputPassword1"
                    name="phone_number">
            </div>

            <div class="chan">
                <a href="#" class="change mt-3">تغيير كلمة السر</a>
                <div class="form mt-4">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">كلمة السر الحالية</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="old_password">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputPassword1" class="form-label">كلمة السر الجديدة</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="new_password">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputPassword1" class="form-label">اعادة كتابة كلمة السر</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="re_password">
                    </div>
                </div>
            </div>

            <div class="bt text-center mt-4">
                <button style="background-color: #0c2520;" type="submit" class="btn btn-dark">حفظ التعديلات</button>
            </div>

        </form>
    </div>


@endsection
