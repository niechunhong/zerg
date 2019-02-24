<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/29 0029
 * Time: 下午 8:48
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['main_img_id','pivot','from','category_id',
        'delete_time','create_time','update_time'];
    //读取器
    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
    public static function getMostRecent($count)
    {
        //desc 倒序排列
        $products = self::limit($count)
            ->order('create_time','desc')
            ->select();
        return $products;
    }
    public static function getProductsByCategoryID($categoryID){
        $products = self::where('category_id','=',$categoryID)
            ->select();
        return $products;
    }
}