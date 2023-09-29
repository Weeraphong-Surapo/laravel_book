<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $products = Book::all();

        // Load the related orders for each product and pluck the prices
        $productChart = $products->map(function ($product) {
            return [
                'product_name' => $product->book_name,
                'product_qty' => $product->book_qty,
            ];
        });
        return view('reportall',compact('productChart'));
    }
}
