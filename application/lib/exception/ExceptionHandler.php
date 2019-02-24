<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/25 0025
 * Time: 上午 10:29
 */

namespace app\lib\exception;

use think\Exception;
use think\exception\Handle;//继承tp5异常类库
use think\Request;
use think\Log;
class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
// 还需要返回客户端当前请求的URL地址
    public function render(\Exception $e){
        if($e instanceof BaseException){
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            //助手函数获取配置文件信息
            if(config('app_debug')){
            return parent::render($e);
            }else {
                $this->code = 500;
                $this->msg = '服务器内部异常';
                $this->errorCode = 999;
                $this->recordErrorlog($e);
            }
        }
        $request = Request::instance();

        $result=[
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request->url()
        ];
        return json($result,$this->code);
    }
    /*
     * 将异常写入日志
     * */
    private function recordErrorlog(\Exception $e){
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(),'error');
    }
}