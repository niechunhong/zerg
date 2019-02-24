<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/31 0031
 * Time: 下午 1:28
 */

namespace app\api\service;

use think\Exception;
use app\api\controller\V1\Token;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;
    function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),
            $this->wxAppID,$this->wxAppSecret,$this->code);
    }
    public function get($code)
    {
        $result = curl_get($this->wxLoginUrl);//返回的为字符串
        $wxResult = json_decode($result, true);//把字符串转换为数组
        if (empty($wxResult)) {
            // 为什么以empty判断是否错误，这是根据微信返回
            // 规则摸索出来的
            // 这种情况通常是由于传入不合法的code
            throw new Exception('获取session_key及openID时异常，微信内部错误');
        } else {
            $loginFail = array_key_exists('errcode', $wxResult);
            if ($loginFail) {
                $this->processLoginError($wxResult);
            } else {
                $this->grantToken();//颁发令牌
            }
        }

    }
     private function grantToken($wxResult)
     {
         //拿到openid
        $openid = $wxResult['openid'];
        }
    protected function processLoginError($wxResult)
    {
        throw new WeChatException([
            'msg'=>$wxResult['errmsg'],
            'errorcode'=>$wxResult['errorcode']
        ]);
    }
}