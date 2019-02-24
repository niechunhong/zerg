<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/24 0024
 * Time: 上午 9:12
 */

namespace app\api\validate;
use think\Validate;

class TextValidate extends Validate
{
    //验证规则
        protected $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
        ];
}