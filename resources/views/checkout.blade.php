@extends('layouts')
@section('content')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <div class="untree_co-section">
        <div class="container">
            <form action="{{ url('/checkout') }}" method="post">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">รายละเอียดที่อยู่</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">ชื่อ <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">นามสกุล <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_fname" class="text-black">เบอร์โทร <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="phone" name="phone">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">ที่อยู่ <span
                                        class="text-danger">*</span></label>
                                <textarea required name="address" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="ระบุที่อยู่ของคุณ..."></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">


                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">สินค้าของคุณ</h2>
                                <div class="p-3 p-lg-5 border bg-white">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>สินค้า</th>
                                            <th>รวม</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                                <tr>
                                                    <td>{{ $cart->books->book_name }} <strong class="mx-2">x</strong>
                                                        {{ $cart->product_qty }}</td>
                                                    <td>{{ number_format($cart->books->book_price * $cart->product_qty, 2) }}
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>ราคารวมทั้งหมด</strong></td>
                                                <td class="text-black font-weight-bold"><strong>฿
                                                        {{ number_format($cart->books->book_price * $cart->product_qty, 2) }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                                href="#collapsebank" role="button" aria-expanded="false"
                                                aria-controls="collapsebank">เลือกการชำระเงิน</a></h3>

                                        <div class="collapse" id="collapsebank">
                                            <div class="py-2">
                                                <p class="mb-0">
                                                <div class="form-check">
                                                    <input required id="my-input" class="form-check-input" type="radio"
                                                        name="pay" value="0"
                                                        onclick="$('#show_pay').addClass('d-none')">
                                                    <label for="my-input" class="form-check-label">ปลายทาง</label>
                                                </div>
                                                <div class="form-check">
                                                    <input required id="my-input" class="form-check-input" type="radio"
                                                        name="pay" value="1"
                                                        onclick="$('#show_pay').removeClass('d-none')">
                                                    <label for="my-input" class="form-check-label">ชำระเงิน</label>
                                                </div>
                                                <div id="show_pay" class="d-none">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d0/QR_code_for_mobile_English_Wikipedia.svg"
                                                        alt="">
                                                    <div class="form-group">
                                                        <label for="my-input">ระบุวันที่ชำระเงิน</label>
                                                        <input id="my-input" class="form-control" type="text"
                                                            name=""
                                                            placeholder="ระบุวันที่โอนเช่น 06/10/66 12.45 น.">
                                                    </div>
                                                </div>

                                                </p>
                                            </div>
                                        </div>
                                    </div>



                                    @csrf
                                    <div class="form-group">
                                        <button class="btn btn-black btn-lg py-3 btn-block">ยืนยันการชำระเงิน</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- </form> -->
            </form>
        </div>
    </div>
@endsection
