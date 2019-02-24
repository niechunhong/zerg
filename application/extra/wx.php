<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/31 0031
 * Time: 下午 5:59
 */
return [
    //  +---------------------------------
    //  微信相关配置
    //  +---------------------------------

    // 小程序app_id
    'app_id' => 'wx4184fe34d63e1094',
    // 小程序app_secret
    'app_secret' => 'ee7ebb8b4e3239549ca1cc4be6e540f8',

    // 微信使用code换取用户openid及session_key的url地址
    'login_url' => "https://api.weixin.qq.com/sns/jscode2session?" .
        "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",

    // 微信获取access_token的url地址
    //'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
     //   "grant_type=client_credential&appid=%s&secret=%s",
];