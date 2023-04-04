<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Cart extends Model
{
    use HasFactory;

    private static $detail;

    public static function addToCart($id){
        self::$detail = new Cart();
        self::$detail -> customer_id = Session::get('customerId');
        self::$detail -> product_id = $id;
        self::$detail -> save();
    }
}
