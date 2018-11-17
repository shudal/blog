<?php

namespace app\index\behavior;

use think\Request;

class Captcha{
  public function run($params){
    if($params=='entry'){
      $captcha_src =captcha_src();
      return '<div><img src="'.$captcha_src.'"  alt="captcha" /></div>';
    }
    else {
      if(!captcha_check($params)){
        return 'failure';
      }
      else return  'success';
    }
  }
}
