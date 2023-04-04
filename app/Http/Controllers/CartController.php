<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Session;
use DB;

class CartController extends Controller
{
    public function cartPage(){
        $cus_id = Session::get('customerId');
//        return $cartItem = DB::table('carts');
//            ->where('customer_id', $cus_id);
        return view('front-end.cart-page');
    }

    public function addItem($id){
        Cart::addToCart($id);
        return back();
    }
}
