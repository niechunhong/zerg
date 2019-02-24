<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/30 0030
 * Time: 下午 2:56
 */

namespace app\api\controller\V1;

use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;

class Product
{
    public function getRecent($count=15){
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        if($products->isEmpty()){
            throw new ProductException();
        }
        //隐藏summary字段
        $products = $products->hidden(['summary']);
        return json($products);
    }
    //商品分类接口
    public function getAllInCategory($id){
        (new IDMustBePositiveInt())->goCheck();
        $products = ProductModel::getProductsByCategoryID($id);
        if($products->isEmpty()){
            throw new ProductException();
        }
        //隐藏summary字段
        $products = $products->hidden(['summary']);
        return json($products);
    }
}