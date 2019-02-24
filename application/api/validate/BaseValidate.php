<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/17 0017
 * Time: 下午 1:37
 */

namespace app\api\validate;//定义公共的基类
//导入框架自定义类
use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    //定义一个基类的方法
    public function goCheck()
    {
        //获取http参数
        $request = Request::instance();
        $params = $request->param();
        //对这些参数做检验，多个参数的时候需要使用加入batch方法
        $result = $this->batch()->check($params);
        if(!$result)
        {
            $e = new ParameterException();
            $e->msg = $this->error;
            throw $e;
            //$error = $this->error;
            //throw new Exception($error);
        }else{
            return true;
        }
    }
    public function isPositiveInteger($value,$rule='',$data='',$field = '')
    {
        if(is_numeric($value) && is_int($value + 0) && ($value + 0)>0){
            return true;
        }else{
            return false;
            //return $field."必须是正整数";
        }
    }
    public function isNotEmpty($value,$rule='',$data='',$field = '')
    {
        if(empty($value)){
            return false;
        }else{
            return true;
            //return $field."必须是正整数";
        }
    }
}