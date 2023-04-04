<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    public function newUser(){
        return view('front-end.register');
    }

    public function saveUser(Request $data){
        Customer::saveUser($data);
        return redirect('/');
    }

    public function loginPage(){
        return view('front-end.user-login');
    }

    public function userLoginCheck(Request $data){
        $customerInfo = Customer::where('email', $data -> user_name)
            ->orWhere('phone',$data->user_name)
            ->first();
        if ($customerInfo){
            $existingPassword = $customerInfo -> password;
            if (password_verify($data -> user_password,$existingPassword)){
                Session::put('customerId',$customerInfo->id);
                Session::put('customerName',$customerInfo->name);
                return redirect('/');
            }else{
                return back() ->with('message','Please use valid email or phone');
            }
        }else{
            return back() ->with('message','Please use valid email or phone');
        }
    }

    public function userLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }
}
