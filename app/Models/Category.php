<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $details;

    public static function changeState($id){
        self::$details = Category::find($id);
        if (self::$details -> cat_status == 1){
            self::$details -> cat_status = 0;
        }else{
            self::$details -> cat_status = 1;
        }
        self::$details -> save();
    }

    public static function saveCategory($data){
        self::$details = new Category();
        self::$details -> cat_name = $data -> cat_name;
        self::$details -> cat_status = $data -> cat_status;
        self::$details -> save();
    }

    public static function updateCategory($data){
        self::$details = Category::find($data -> cat_id);
        self::$details -> cat_name = $data -> cat_name;
        self::$details -> save();
    }
}
