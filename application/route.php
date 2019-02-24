<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

    use think\Route;
    Route::get('api/:version/banner/:id','api/:version.banner/getBanner');
    Route::get('api/:version/theme','api/:version.theme/getSimpleList');
// 路由使用完整匹配,'route_complete_match'   => true,
    Route::get('api/:version/theme/:id','api/:version.theme/getComplexOne');

    Route::get('api/:version/product/recent','api/:version.product/getRecent');
    //分类商品接口
    Route::get('api/:version/product/by_category','api/:version.product/getAllInCategory');
    //分类接口路由
    Route::get('api/:version/category/all','api/:version.category/getAllCategories');
    Route::post('api/:version/token/user','api/:version.token/getToken');