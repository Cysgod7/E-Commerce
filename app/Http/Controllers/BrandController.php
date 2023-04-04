<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandPage(){
        return view('admin.brand.brand',[
            'blist' => Brand::all()
        ]);
    }

    public function editBrand($id){
        return view('admin.brand.edit-brand',[
            'blist' => Brand::find($id)
        ]);
    }

    public function updateBrand(Request $data){
        Brand::updateBrand($data);
        return redirect('/brand') ->with('message', 'Update Successful');
    }

    public function saveBrand(Request $data){
        Brand::saveBrand($data);
        return back() ->with('message', 'Entry Successful');
    }

    public function changeState($id){
        Brand::changeState($id);
        return back();
    }

    public function deleteBrand(Request $data){
        $item = Brand::find($data -> brand_id);
        if ($item -> brand_logo){
            unlink($item -> brand_logo);
        }
        $item -> delete();
        return back() ->with('message', 'Deletion Successful');
    }
}
