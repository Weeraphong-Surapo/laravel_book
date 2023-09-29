@extends('layouts')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="p-3 p-lg-5 border bg-white">
                <div class="row mb-5">

                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">ลำดับ</th>
                                    <th class="product-thumbnail">รหัส</th>
                                    <th class="product-price">วันที่ซื้อ</th>
                                    <th class="product-price">สถานะ</th>
                                    <th class="product-quantity" width="17%">รายละเอียด</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @if ($lists->count() >= 1)
                                    @foreach ($lists as $list)
                                        <tr>
                                            <td class="product-thumbnail">
                                                {{ $i++ }}
                                            </td>
                                            <td class="product-thumbnail">
                                                {{ $list->code }}
                                            </td>
                                            <td class="product-name">
                                                {{ $list->created_at }}
                                            </td>
                                            <td>
                                                @if ($list->status == 0)
                                                    <span class="badge bg-warning">รออนุมัติ</span>
                                                @elseif ($list->status == 1)
                                                    <span class="badge bg-success">อนุมัติ</span>
                                                @else
                                                    <span class="badge bg-danger">ไม่อนุมัติ</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('history.show', $list->id) }}" class="btn">ดูรายการ</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">ไม่พบประวัติการซื้อ</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
