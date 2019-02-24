<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28 0028
 * Time: 下午 12:15
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}