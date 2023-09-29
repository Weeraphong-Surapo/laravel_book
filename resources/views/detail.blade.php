@extends('layouts')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="p-3 p-lg-5 border bg-white">
                <div class="row mb-5">
                    <div class="col-5">
                        <h5 class="text-dark mb-4">ชื่อ : {{ $lists->first_name }}</h5>
                        <h5 class="text-dark mb-4">นามสกุล : {{ $lists->last_name }}</h5>
                        <h5 class="text-dark mb-4">เบอร์โทร : {{ $lists->phone }}</h5>
                        <h5 class="text-dark mb-4">ที่อยู่ : {{ $lists->address }}</h5>
                        <h5 class="text-dark mb-4">วันที่สั่งซื้อ : {{ $lists->created_at }}</h5>

                    </div>
                    <div class="col-7">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <div class="p-3 p-lg-5 border bg-white">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>สินค้า</th>
                                            <th>รวม</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($lists->orders as $order)
                                                <tr>
                                                    <td>{{ $order->product_name }} <strong class="mx-2">x</strong>
                                                        {{ $order->product_qty }}</td>
                                                    <td>{{ $order->product_price * $order->product_qty }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                                href="#collapsebank" role="button" aria-expanded="false"
                                                aria-controls="collapsebank">การชำระเงิน : {{ $lists->type_pay == 1 ? 'โอนชำระ' : 'ชำระปลายทาง' }}</a></h3>

                                        {{-- <div class="collapse" id="collapsebank">
                                            <div class="py-2">
                                                <p class="mb-0">

                                            </p>
                                    
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('history.index') }}" class="btn">กลับ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
