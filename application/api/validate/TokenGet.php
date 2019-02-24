<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/31 0031
 * Time: 上午 11:55
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];
    protected $message = [
        'code'=>'没有code还想获取token,做梦哦'
    ];
}