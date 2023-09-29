@extends('layouts')
@section('content')
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                @if ($books->count() >= 1)
                    @foreach ($books as $book)
                        <!-- Start Column 1 -->
                        <div class="col-12 col-md-4 col-lg-3 mb-5">
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $book->id }}" name="product_id">
                                <button type="submit" class="product-item" href="{{ url('addCart') }}">
                                    <img src="{{ asset($book->book_img) }}" class="img-fluid product-thumbnail">
                                    <h3 class="product-title">{{ $book->book_name }}</h3>
                                    <strong class="product-price">฿ {{ number_format($book->book_price, 2) }} บาท</strong>

                                    <span class="icon-cross">
                                        <img src="images/cross.svg" class="img-fluid">
                                    </span>
                                </button>
                            </form>
                        </div>
                        <!-- End Column 1 -->
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {{ $books->links() }}
                    </div>
               
                @else
                    <h1 class="alert text-center mt-4">ยังไม่มีสินค้า</h1>
                @endif

            </div>
        </div>
    </div>

@endsection
