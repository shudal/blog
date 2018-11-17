<?php
namespace app\index\behavior;
use app\common\model\Unkeys;
class Filter{
  public function run($params){

    if($params=='admin'){
      $unkeys = Unkeys::all();
      return $unkeys;
    }
    else if(is_assoc($params)){
      if($params['command']=='delete'){
      $unkey =Unkeys::get($params['id']);
      $unkey->delete();
      return '已删除此关键词';
      }
      else {
        $unkey = new Unkeys ;
        $unkey->keyword = $params['unkey'];
        $unkey->save();
        return '已添加此关键词';
      }
    }
    else{
    $dict = Unkeys::all();
     //$dict = array("//评");
    foreach($params as $key=>$value){
      $cont = $value['content'];
      $tai=0;
      for($k=0;$k<count($dict);++ $k){
        if(strpos($cont,$dict[$k]->keyword)!==FALSE){
         $tai=1;
          break;
        }
      }
      if($tai){
        unset($params[$key]);
      }
    }
    return $params;
  }
  }
}
 
