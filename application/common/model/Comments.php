<?php

namespace app\common\model;

use think\Model;

class Comments extends Model
{
  protected $autoWriteTimestamp=true;
  protected $insert = ['publish_time'];
  public function setContentAttr($value){
    return htmlentities($value);
  }
  protected function getPublishTimeAttr($value){
    return date('Y-m-d H:i:s',$value);
  }
  public function setPublishTimeAttr($value){
    return time();
  }
}
