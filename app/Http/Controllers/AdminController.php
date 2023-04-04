<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function manageUser(){
        return view('admin.user.user-manage',[
            'users' => User::all()
        ]);
    }

    public function userEdit($id){
        return view('admin.user.edit-user',[
            'user' => User::find($id)
        ]);
    }

    public function updateUser(Request $data){
        User::updateUser($data);
        return back()->with('message','Update Successful');
    }
}
