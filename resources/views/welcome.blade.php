@extends('layouts')
@section('content')
    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">ขายหนังสือออนไลน์</h2>
                    <p class="mb-4">เลือกซื้อให้หนุกนะ. </p>

                </div>
                <!-- End Column 1 -->

                @foreach ($books as $book)
                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="{{url('/shopbook')}}">
                            <img src="{{$book->book_img}}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{$book->book_name}}</h3>
                            <strong class="product-price">฿ {{number_format($book->book_price,2)}} บาท</strong>

                            <span class="icon-cross">
                                <img src="images/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->
                @endforeach


            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">เกี่ยวกับเรา</h2>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/truck.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>ส่งเร็ว &amp; ส่งฟรี</h3>
                                <p>การจัดเตรียมที่ไว.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/bag.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>ง่ายต่อการช้อป</h3>
                                <p>เลือกซื้อได้ง่าย.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/support.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>ซัพพอร์ต 24 ชั่วโมง</h3>
                                <p>ให้ความช่วยเหลือ.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/return.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>คืนสินค้าได้หากสินค้าเสียหาย</h3>
                                <p>ฟรีไม่ค่าจัดส่ง.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->
@endsection
