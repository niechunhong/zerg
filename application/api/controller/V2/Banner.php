<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/14 0014
 * Time: 下午 3:13
 */

namespace app\api\controller\V2;

class Banner
{
    /**
     * 获取指定的id banner的信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {
        //
        return 'this is version V2';
    }

}
