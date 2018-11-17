<?php

namespace app\index\behavior;
use app\common\model\Categories;
use app\common\model\Blog;
class Classfilter{
  public function run($params){
    if($params=='admin'){
      $cates = Categories::all();
      return $cates;
    }
    else if ($params=='index'){
    $cates = Categories::where('tai','=','display')->select();
    return $cates;
    }
    else {
      $class = Categories::get($params['id']);
      $rclass = Blog::where('category_id','=',$class->category_id)->select();
      for($x=0;$x<count($rclass);$x++){
        $rclass[$x]->tai = $params['tai'];
        $rclass[$x]->save();
      }

      $class->tai = $params['tai'];

      $class->save();
      return '分类显示状态已成功更改';
    }
  }
}
