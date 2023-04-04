<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $products = Product::where('product_status', 1)
            ->join('categories','products.cat_id','categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.cat_name','brands.brand_name')
            ->take(5)
            ->get();

        return view('front-end.home',[
            'products' => $products
        ]);
    }

    public function detailProduct($id){
        return view('front-end.single-product',[
            'detail' => DB::table('products')
                ->where('products.id',$id)
                ->join('categories','products.cat_id','categories.id')
                ->select('products.*','categories.cat_name')
                ->first()
        ]);
    }

    public function showProducts(){
        $products = Product::where('product_status', 1)
            ->join('categories','products.cat_id','categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.cat_name','brands.brand_name')
            ->take(20)
            ->get();
        return view('front-end.shop-page',[
            'products' => $products
        ]);
    }
}
