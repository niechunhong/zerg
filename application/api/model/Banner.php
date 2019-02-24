<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/17 0017
 * Time: 上午 11:34
 */

namespace app\api\model;
use think\Db;
use think\Model;

class Banner extends Model
{
    protected $hidden = ['update_time','delete_time'];
    /*BannerItem 为关联模型
     * BannerItem模型的外键
     *Banner 模型的主键
     *  */
    public function items(){
        //一对多关系查询
        return $this->hasMany('BannerItem','banner_id','id');
    }
    public static function getBannerByID($id)
    {
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
        //根据id号，获取banner的信息
        //try{
          //1/0;
      // }
       // catch(Exception $ex)
       // {
       // throw $ex;
       // }
     // return 'this is banner info';
        //return null;
        //$result = Db::query(
            //方法一：原生语句查询数据库
           // "select * from banner_item where banner_id = ?",[$id]);
            //方法2
            //$result = Db::table('banner_item')
             //   ->where('banner_id','=',$id)
              //  ->select();
        //方法三：表达式、数组法（不建议使用）、闭包法
        //$result = Db::table('banner_item')
           // ->where(function ($query) use ($id){
           ///    $query->where('banner_id','=',$id);
           // })
            //->select();
        //return $result;
    }
}
