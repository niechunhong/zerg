<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/14 0014
 * Time: 下午 3:13
 */

namespace app\api\controller\V1;
use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;

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
        //独立验证
        //$data = [
         //   'name' => 'vendor1234567',
         //   'email' => 'vendorqq.com'
        //];
       // $validate = new Validate([
         //   'name' => 'require|max:10',
        //    'email' => 'email'
        //]);
       // $data = [
        //    'id' => '$id'
        //];
        //$validate = new IDMustBePositiveInt();
        //var_dump($validate);
      //批量验证
        //$result = $validate->batch()->check($data);
        //var_dump($validate->getError());
        //if($result){

       // }else{

        //}
        (new IDMustBePositiveInt())->goCheck();

            //范围解析操作符（::）

//范围解析操作符（也可称作 Paamayim Nekudotayim）或者更简单地说是一对冒号，可以用于访问静态成员、方法和常量，还可以用于覆盖类中的成员和方法。

//当在类的外部访问这些静态成员、方法和常量时，必须使用类的名字。
            $banner = BannerModel::getBannerByID($id);
        //$banner = BannerModel::with('items')->find($id);
        //嵌套关联查询
        //$banner = BannerModel::with(['items','items.img'])->find($id);
            //var_dump(!$banner);exit;
            //$banner->hidden(['update_time','delete_time']);
            //$banner->visible(['id','update_time']);
            if(!$banner){
                //echo 1;
                throw new BannerMissException();
            }
            return json($banner);
        //$c = 1;
    }
}
