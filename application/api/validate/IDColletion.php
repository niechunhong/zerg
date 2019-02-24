<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/20 0020
 * Time: 上午 10:56
 */

namespace app\api\validate;


class IDColletion extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];
    protected $message = [
        'ids' =>'ids必须是以逗号隔开的多个正整数'
    ];
    //ids = id1,id2...
    protected function checkIDs($value){
        $values = explode(',',$value);
        if(empty($value)){
            return false;
        }
        foreach($values as $id){
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}