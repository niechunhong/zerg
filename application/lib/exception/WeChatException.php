<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/1 0001
 * Time: 下午 7:09
 */

namespace app\lib\exception;



class WeChatException extends BaseException
{
    /*
     * 微信服务器异常
     * */
    public $code = 400;
    public $msg = 'wechat unknown error';
    public $errorCode = 999;
}