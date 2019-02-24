<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/30 0030
 * Time: 下午 7:57
 */

namespace app\api\controller\V1;

use app\api\model\Category as CategoryModel;
class Category
{
    public function getAllCategories(){
        /*
         * []代表
         * img 关联方法
         * */
        $categories = CategoryModel::all([],'img');
        return json($categories);
    }
}