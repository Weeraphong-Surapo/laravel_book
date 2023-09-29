<?php

namespace App\Http\Controllers;

use App\Models\ListSale;
use Illuminate\Http\Request;

class OrderContoller extends Controller
{
    public function index(){
        $lists =  ListSale::with('orders')->get();
        return view('admin.order',compact('lists'));
    }
}
