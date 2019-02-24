<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/29 0029
 * Time: 上午 10:51
 */

namespace app\api\model;

use think\Model;

class BannerItem extends Model
{
    protected $hidden = ['update_time','delete_time','id','img_id','banner_id'];
    public function img(){
        return $this->belongsTo('Image','img_id','id');//一对一关系查询
    }
}