<?php
namespace app\index\behavior;
use app\common\model\Blog;
class Stat{
  public function run($params){
    if($params['command']=='add'){
    if($params['type']=='blog'){
      $blog = Blog::get($params['id']);
      $blog->sum = $blog->sum + 1;
      $blog->save();
    }
    }
    else if($params['command']=='get'){
      if($params['type']=='blog'){
        $blog = Blog::get($params['id']);
        return $blog->sum;
      }
    }
  }
}
