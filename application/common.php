<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function phd(){
  return "/home/perci/tp/tp5/";
}
function temproot(){
  return "../application/index/view/".app\common\model\Base::where('tai','=','now')->field('src')->select()[0]->src."/";
}
function distai($txt){
  return view(temproot().'base.html',['distai'=>$txt]);
}

    function is_assoc($array) {
        if(is_array($array)) {
                    $keys = array_keys($array);
                    return $keys != array_keys($keys);
                }
            return false;
        }
