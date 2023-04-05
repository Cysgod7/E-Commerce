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
        $price = Cart::where('customer_id', Session::get('customerId'))
            ->join('products','carts.product_id','products.id')
            ->sum(DB::raw('products.product_price * carts.product_quantity'));
        Session::put('cartItemPrice',$price);
        $count = Cart::where('customer_id', Session::get('customerId'))->count();
        Session::put('cartItemCount',$count);
        return view('front-end.cart-page',[
            'cartItem' => $cartItem,
        ]);
    }

    public function addItem($id){
        Cart::addToCart($id);
        return back();
    }

    public function quantityPlus($id){
        Cart::increaseQuantity($id);
        return back();
    }

    public function quantityMinus($id){
        Cart::decreaseQuantity($id);
        return back();
    }

    public function deleteCartItem($id){
        $cartItem = Cart::find($id);
        $cartItem -> delete();
        return back();
    }
}
