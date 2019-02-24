<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/29 0029
 * Time: 下午 8:48
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden = ['delete_time','update_time','topic_img_id','head_img_id'];
    //一对一Theme关联image表
    public function topicImg(){
        return $this->belongsTo('image','topic_img_id','id');
    }
    public function headImg(){
        return $this->belongsTo('image','head_img_id','id');
}
    /*
     * 多对多关系
     * 'theme_product' 中间表
     * Product 关联模型
     * */
    public function products(){
        return $this->belongsToMany('Product','theme_product','product_id',
            'theme_id');
    }
    public static function getThemeWithProducts($id){
        $theme = self::with('products,topicImg,headImg')->find($id);
        return $theme;
    }
}