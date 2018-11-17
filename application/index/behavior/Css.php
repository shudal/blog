<?php
namespace app\index\behavior;                                                            
use app\common\model\Css as CssModel;                                                    
class Css{                                                                               
  public function run($params){                                                          
    if(is_assoc($params)){                                                               
      if($params['command']=='newCss'){                                                  
        $newcss = new CssModel;                                                          
        $newcss->src = $params['src'];                                                   
        $newcss->content=$params['content'];                                             
        $newcss->save();                                                                 
        return '新增Css成功';
      }
      else if($params['command']=='delete'){
        $css= CssModel::get($params['id']);
        $css->delete();
        return '删除Css成功';
      }
    
    }

    else if($params=='csses') return CssModel::all();
    else{
    $cuscss = CssModel::where('src','=',$params)->select();
    if(count($cuscss)) return $cuscss[0]->content;
    else return '';
    }
  } 
}
