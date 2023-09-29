@extends('layouts')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="p-3 p-lg-5 border bg-white">
                <div class="row mb-5">

                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">รูปภาพ</th>
                                    <th class="product-name">สินค้า</th>
                                    <th class="product-price">ราคา</th>
                                    <th class="product-quantity">จำนวน</th>
                                    <th class="product-total">ราคารวม</th>
                                    <th class="product-remove">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp

                                @if ($carts->count() >= 1)
                                    @foreach ($carts as $cart)
                                        @php
                                            $total += $cart->books->book_price * $cart->product_qty;
                                        @endphp
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="{{ asset($cart->books->book_img) }}" alt="Image"
                                                    class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $cart->books->book_name }}</h2>
                                            </td>
                                            <td>{{ $cart->books->book_price }}</td>
                                            <td>
                                                <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                    style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-black decrease"
                                                            type="button">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center quantity-amount"
                                                        value="{{ $cart->product_qty }}" placeholder=""
                                                        aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-black increase"
                                                            type="button">&plus;</button>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>{{ number_format($cart->books->book_price * $cart->product_qty) }}</td>
                                            <td>
                                                <form action="{{ route('cart.destroy', $cart->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-black btn-sm">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">ไม่มีสินค้าในตะกร้า</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <button class="btn btn-black btn-sm btn-block">Update Cart</button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/shopbook') }}"
                                    class="btn btn-outline-black btn-sm btn-block">เลือกซื้อสินค้าต่อ</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">ตะกร้า</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">รวม</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">฿ {{ number_format($total) }} บาท</strong>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">รวมทั้งหมด</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">฿ {{ number_format($total) }} บาท</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        @if ($carts->count() >= 1)
                                            <a href="{{ url('checkout') }}" class="btn btn-black btn-lg py-3 btn-block">
                                                ดำเนินการต่อ</a>
                                        @else
                                            <a href="{{ url('/shopbook') }}" class="btn btn-black btn-lg py-3 btn-block">
                                                ไปเลือกซื้อสินค้า</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
