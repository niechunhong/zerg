<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/30 0030
 * Time: 下午 8:00
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time','update_time','create_time'];
    //定义一个关联关系
    public function img()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }
}