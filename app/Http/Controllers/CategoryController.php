<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryPage(){
        return view('admin.category.category',[
            'Clist' => Category::all()
        ]);
    }

    public function saveCategory(Request $data){
        Category::saveCategory($data);
        return back() ->with('message', 'Entry Successful');
    }

    public function editCategory($id){
        return view('admin.category.edit-category',[
            'Clist' => Category::find($id)
        ]);
    }

    public function updateCategory(Request $data){
        Category::updateCategory($data);
        return redirect('/category') ->with('message', 'Update Successful');
    }

    public function changeState($id){
        Category::changeState($id);
        return back();
    }

    public function deleteCategory(Request $data){
        $item = Category::find($data -> cat_id);
        $item -> delete();
        return back() ->with('message', 'Deletion Successful');
    }
}
