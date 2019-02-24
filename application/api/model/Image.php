<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/29 0029
 * Time: 下午 3:04
 */

namespace app\api\model;


class Image extends BaseModel
{
    protected $hidden = ['update_time','delete_time','id','from'];
    public function getUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
}