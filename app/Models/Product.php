<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $details, $dt, $image, $imageUrl;


    private static function saveImage($data){
        self::$dt = new \DateTime('now', new \DateTimeZone('Asia/Dhaka'));
        self::$image = $data -> file('product_image');
        self::$imageUrl = 'admin-asset/upload-image/product/'.'product-'.self::$dt -> format('Ymdhis').'.'.self::$image -> Extension();
        self::$image -> move('admin-asset/upload-image/product/', self::$imageUrl);
        return self::$imageUrl;
    }
    private static function makeSlug($data){
        $str = $data->product_name;
        return preg_replace('/\s+/u','-',trim($str));
    }

    public static function pro_entry($data){
        if ($data -> product_id){
            self::$details = Product::find($data -> product_id);
        }else{
            self::$details = new Product();
            self::$details -> product_status = $data -> product_state;
        }
        self::$details -> product_name = $data -> product_name;
        self::$details -> product_des = $data -> product_des;
        self::$details -> product_slug = self::makeSlug($data);
        self::$details -> brand_id = $data -> brand_name;
        self::$details -> cat_id = $data -> cat_name;
        self::$details -> entry_date = $data -> product_date;
        self::$details -> product_price = $data -> product_price;
        if ($data -> file('product_image')) {
            if (file_exists(self::$details->product_image)) {
                unlink(self::$details->product_image);
            }
            self::$details->product_image = self::saveImage($data);
        }
        self::$details -> save();
    }

//    public static function updateProduct($data){
//        self::$details = Product::find($data -> product_id);
//        self::$details -> product_name = $data -> product_name;
//        self::$details -> product_des = $data -> product_des;
//        self::$details -> product_slug = self::makeSlug($data);
//        self::$details -> brand_id = $data -> brand_name;
//        self::$details -> cat_id = $data -> cat_name;
//        self::$details -> entry_date = $data -> product_date;
//        self::$details -> product_quantity = $data -> product_quantity;
//
//        if ($data -> file('product_image')){
//            if (self::$details -> product_image){
//                if (file_exists(self::$details -> product_image)){
//                    unlink(self::$details -> product_image);
//                    self::$details -> product_image = self::saveImage($data);
//                }
//                else{
//                    self::$details -> product_image = self::saveImage($data);
//                }
//            }
//        }
//
//        self::$details -> save();
//    }

    public static function changeState($id){
        self::$details = Product::find($id);
        if (self::$details -> product_status == 1){
            self::$details -> product_status = 0;
        }else{
            self::$details -> product_status = 1;
        }
        self::$details -> save();
    }
}
