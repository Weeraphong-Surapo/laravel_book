<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ListSale;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index(){
        $carts = Cart::where('user_id', Auth::user()->id)
        ->with('books')
        ->get();
        return view('checkout',compact('carts'));
    }

    public function checkout(Request $request){
        $list = new ListSale;
        $list->code = '#'.time();
        $list->first_name = $request->input('first_name');
        $list->last_name = $request->input('last_name');
        $list->phone = $request->input('phone');
        $list->address = $request->input('address');
        $list->user_id = Auth::user()->id;
        $list->type_pay = $request->pay;
        $list->save();

        $carts = Cart::where('user_id', Auth::user()->id)
        ->with('books')
        ->get();

        foreach($carts as $cart){
            $order = new Order;
            $order->list_sale_id = $list->id;
            $order->book_id = $cart->books->id;
            $order->product_name = $cart->books->book_name;
            $order->product_qty = $cart->product_qty;
            $order->product_price = $cart->books->book_price;
            $order->save();
        }

        $cartUser = Cart::where('user_id',Auth::user()->id);
        $cartUser->delete();
        return view('thankyou');



   
    }
}
