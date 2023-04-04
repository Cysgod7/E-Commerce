<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Customer extends Model
{
    use HasFactory;
    private static $customer;
    public static function saveUser($data){
        self::$customer = new Customer();
        self::$customer -> name = $data -> cust_name;
        self::$customer -> email = $data -> cust_email;
        self::$customer -> phone = $data -> cust_phone;
        self::$customer -> password = bcrypt($data -> cust_password);
        self::$customer -> save();
        Session::put('customerId',self::$customer->id);
        Session::put('customerName',self::$customer->name);
    }
}
