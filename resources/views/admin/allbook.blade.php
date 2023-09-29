@extends('layouts')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-1">
                        <a href="#" onclick="printPdfProduct()" class="btn bg-success mx-2">พิมพ์ PDF</a>
                        <a href="{{ url('admin/allbook/create') }}" class="btn bg-primary">เพิ่มสินค้า</a>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูปภาพ</th>
                                    <th>สินค้า</th>
                                    <th>ราคา/บาท</th>
                                    <th>จำนวน</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($books as $book)
                                    <tr>
                                        <td width="7%">{{ $i++ }}</td>
                                        <td width="15%">
                                            <img width="170" height="170" src="{{ asset($book->book_img) }}"
                                                alt="">
                                        </td>
                                        <td width="30%">{{ $book->book_name }}</td>
                                        <td width="30%">{{ number_format($book->book_price, 2) }}</td>
                                        <td width="30%">{{ number_format($book->book_qty) }}</td>
                                        <td width="13%">
                                            <div class="btn-group">
                                                <a href="{{ url('/admin/allbook/' . $book->id . '/edit') }}"
                                                    class="btn btn-secondary">แก้ไข</a>
                                                <form action="{{url('/admin/allbook',$book->id)}}" method="post" id="form-delete-book">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn bg-danger"
                                                        onclick="return confirmDelete();">ลบ</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printPdfProduct() {
            const printWindow = window.open(`/generate-pdfProduct`, '',
                'width=900,height=900');
            printWindow.onload = function() {
                printWindow.print();
                // printWindow.close();

            };
        }

        function confirmDelete() {
            if (confirm('ต้องการลบ?')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection
