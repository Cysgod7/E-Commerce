<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Session;
use DB;

class CartController extends Controller
{
    public function cartPage(){
        $cartItem = Cart::where('customer_id', Session::get('customerId'))
            ->join('products','carts.product_id','products.id')
            ->join('brands','brands.id','products.brand_id')
            ->join('categories','categories.id','products.cat_id')
            ->select('carts.*', 'products.product_name','products.product_price','products.product_image','brands.brand_name','categories.cat_name')
            ->get();
        return view('front-end.cart-page',[
            'cartItem' => $cartItem
        ]);
    }

    public function addItem($id){
        Cart::addToCart($id);
        return back();
    }
}
