@extends('layouts.main-layout')

@section('page_title', 'إضافة منتج')

@section('content')

    <x-inside-navbar />

    <div class="addWork">
        <div class="add">
            <h4>أضف منتج</h4>

            <x-auth-validation-errors />

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                {{-- Product Name --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">اسم المنتج</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="product_name">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                {{-- End Product Name --}}

                {{-- Category --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">فئة المنتج</label> <br>
                    <select name="category">
                        @endphp
                        @foreach ($categories as $category)
                            @php
                                $name = null;
                                if ($category->category_name == 'Food') {
                                    $name = 'المواد الغذائية';
                                }
                            @endphp
                            <option value="{{ $category->id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- End Category --}}

                {{-- quantity --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">الكمية المتاحة</label>
                    <input type="number" class="form-control" id="exampleInputquant" aria-describedby="quant"
                        name="quantity">
                </div>
                {{-- End quantity --}}

                {{-- Description --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">وصف المنتج</label> <br>
                    <textarea name="description" id="" cols="50" rows="5"></textarea>
                </div>
                {{-- End Description --}}

                {{-- Price --}}
                <div class="mb-3">
                    <label for="exampleInputPrice" class="form-label">سعر المنتج</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="price">
                </div>
                {{-- End Price --}}

                {{-- Offer --}}
                <br>
                <div class="form-check">
                    <label class="form-check-label" for="defaultCheck1">
                        هل هذا المنتج عبارة عن عرض ؟
                    </label>
                    <input class="form-check-input" type="checkbox" id="defaultCheck1" name="offer">
                </div>
                <br>
                {{-- End Offer --}}

                {{-- Cover Image --}}
                <div class="downloadImage mb-3">
                    <label for="exampleInputPrice" class="form-label">أضف صورة المنتج</label>
                    <div class="download">
                        <input type="file" name="cover_image">
                    </div>
                </div>
                {{-- End Cover Image --}}

                <div class="but text-center">
                    <br>
                    <button style="background-color: #0c2520;" class="btn" type="submit">
                        <a class="okkk">
                            أرسل
                        </a>
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection
