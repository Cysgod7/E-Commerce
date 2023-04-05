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

    public static function increaseQuantity($id){
        self::$detail = Cart::find($id);
        self::$detail -> product_quantity += 1;
        self::$detail -> save();
    }

    public static function decreaseQuantity($id){
        self::$detail = Cart::find($id);
        if (self::$detail -> product_quantity == 1){
            self::$detail -> delete();
        }else{
            self::$detail -> product_quantity -= 1;
            self::$detail -> save();
        }
    }
}
