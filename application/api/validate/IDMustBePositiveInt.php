<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/17 0017
 * Time: 下午 2:23
 */

namespace app\api\validate;

class IDMustBePositiveInt extends BaseValidate
{//自定义验证规则
    protected $rule = [
        'id' => 'require|isPositiveInteger',
        'num'=>'in:1,2,3'
    ];
    protected $message = [
        'id' =>'id必须是正整数'
    ];
    //public function isPositiveInteger($value,$rule='',$data='',$field = '')
    //{
       // if(is_numeric($value) && is_int($value + 0) && ($value + 0)>0){
        //    return true;
        //}else{
        //    return $field."必须是正整数";
        //}
   // }
}