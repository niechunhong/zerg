<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/20 0020
 * Time: 上午 10:38
 */

namespace app\api\controller\V1;
use app\api\validate\IDColletion;
use app\api\model\Theme as ThemeModel;
use app\lib\exception\ThemeException;
use app\api\validate\IDMustBePositiveInt;

class Theme
{
    /**
     * @url /theme/ids=id1,id2,id3,.....
     * @return 一组theme模型
     */
    public function getSimpleList($ids = ''){
        (new IDColletion())->goCheck();
        $ids = explode(',',$ids);
        $result = ThemeModel::with('topicImg,headImg')
        ->select($ids);
        //$result->isEmpty()判断数据集是否为空
        if($result->isEmpty()){
            throw new ThemeException();
        }
        return json($result);
    }
    public function getComplexOne($id){
        (new IDMustBePositiveInt())->goCheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if(!$theme){
            throw new ThemeException();
        }
        return json($theme);
    }
}