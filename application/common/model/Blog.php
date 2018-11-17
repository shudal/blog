<?php

namespace app\common\model;

use think\Model;

class Blog extends Model
{
  protected $insert = ['publish_time'];
  protected $autoWriteTimestamp=true;
  public function setContentAttr($value){
    return htmlentities($value);
  }
  protected function getPublishTimeAttr($value){
    return date('Y-m-d H:i',$value);
  }
  public function setPublishTimeAttr($value){
    return time();
  }
}
