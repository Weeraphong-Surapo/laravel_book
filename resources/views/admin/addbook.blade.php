@extends('layouts')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title border-bottom">ฟอร์มเพิ่มสินค้า</h5>
                    <form action="{{url('admin/allbook')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-5">
                            <div class="form-group">
                                <label for="my-input">ชื่อสินค้า</label>
                                <input required class="form-control" type="text" name="book_name" placeholder="ระบุชื่อสินค้า">
                            </div>
                            <div class="form-group">
                                <label for="my-input">ราคาสินค้า</label>
                                <input required class="form-control" type="number" name="book_price"
                                    placeholder="ระบุชื่อราคาสินค้า">
                            </div>
                            <div class="form-group">
                                <label for="my-input">จำนวนสินค้า</label>
                                <input required class="form-control" type="number" name="book_qty"
                                    placeholder="ระบุชื่อจำนวน">
                            </div>
                            <div class="form-group">
                                <label for="my-input">รูปภาพสินค้า</label>
                                <input required class="form-control" type="file" name="book_img">
                            </div>

                            <button class="btn btn-success mt-3">บันทึก</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
