<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/25 0025
 * Time: 上午 10:51
 */

namespace app\lib\exception;
class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求Banner不存在';
    public $errorCode = 40000;
}