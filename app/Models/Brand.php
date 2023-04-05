<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $details, $dt, $image, $imageUrl;

    private static function saveImage($data){
        self::$dt = new \DateTime('now', new \DateTimeZone('Asia/Dhaka'));
        self::$image = $data -> file('brand_logo');
        self::$imageUrl = 'admin-asset/upload-image/brand/'.'brand-'.self::$dt -> format('Ymdhis').'.'.self::$image -> Extension();
        self::$image -> move('admin-asset/upload-image/brand/', self::$imageUrl);
        return self::$imageUrl;
    }

    public static function saveBrand($data){
        self::$details = new Brand();
        self::$details -> brand_name = $data -> brand_name;
        self::$details -> brand_status = $data -> brand_status;
        if ($data -> file('brand_logo')){
            self::$details -> brand_logo  = self::saveImage($data);
        }else{
            self::$details -> brand_logo = ' ';
        }
        self::$details -> save();
    }

    public static function updateBrand($data){
        self::$details = Brand::find($data->brand_id);
        self::$details->brand_name = $data->brand_name;

        if ($data->file('brand_logo')) {
            if (self::$details->brand_logo) {
                if (file_exists(self::$details->brand_logo)) {
                    unlink(self::$details->brand_logo);
                    self::$details->brand_logo = self::saveImage($data);
                } else {
                    self::$details->brand_logo = self::saveImage($data);
                }
            }
        }
        self::$details -> save();
    }

    public static function changeState($id){
        self::$details = Brand::find($id);
        if (self::$details -> brand_status == 1){
            self::$details -> brand_status = 0;
        }else{
            self::$details -> brand_status = 1;
        }
        self::$details -> save();
    }
}
