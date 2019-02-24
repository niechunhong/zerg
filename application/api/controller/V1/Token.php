<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/31 0031
 * Time: 上午 11:38
 */

namespace app\api\controller\V1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    //客户端传过来的code码
    public function getToken($code='')
    {
        (new TokenGet())->goCheck();
        $ut = new UserToken($code);
        $token=$ut->get();
        return $token;
    }
}