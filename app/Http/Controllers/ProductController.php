<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function addProduct(){
        return view('admin.product.add-product',[
            'Blist' => Brand::all(),
            'Clist' => Category::all()
        ]);
    }

    public function manageProduct(){
        return view('admin.product.manage-product',[
            'list' => DB::table('products')
                ->join('brands','products.brand_id','brands.id')
                ->join('categories','products.cat_id','categories.id')
                ->select('products.*','cat_name','brand_name')
                ->get()
        ]);
    }

    public function enterProduct(Request $data){
        Product::pro_entry($data);
        return redirect('/products') -> with('message', 'Entry success');
    }

    public function updateProduct(Request $data){
        Product::pro_entry($data);
        return redirect('/products') -> with('message', 'Update Complete');
    }

    public function editProduct($id){
        return view('admin.product.edit-product',[
            'Blist' => Brand::all(),
            'Clist' => Category::all(),
            'product' => Product::find($id)
        ]);
    }

    public function changeState($id){
        Product::changeState($id);
        return back();
    }

    public function deleteProduct(Request $data){
        $item = Product::find($data -> product_id);
        if ($item -> product_image){
            unlink($item -> product_image);
        }
        $item -> delete();
        return back() -> with('message', 'Deletion Complete');
    }
}
