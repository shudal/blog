<?php

namespace app\index\validate;

use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
  protected $rule = [
    'username'=>'require|alphaDash|length:4,25',
    'password'=>'require|length:4,25',
  
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
  protected $message = [
    
  ];
}
