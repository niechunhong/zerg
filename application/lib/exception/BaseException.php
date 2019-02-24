<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/26 0026
 * Time: 下午 12:47
 */

namespace app\lib\exception;



use think\Exception;

class BaseException extends Exception
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
    public function __construct($params = [])
    {
        //如果不是数组，直接返回
        if(!is_array($params)) {
            return;
        }
            if(array_key_exists('code',$params)){
            $this->code = $params['code'];
            }
            if(array_key_exists('msg',$params)){
                $this->msg = $params['msg'];
            }
            if(array_key_exists('errorCode',$params)){
                $this->errorCode = $params['errorCode'];
            }

    }
}