<?php
namespace app\index\validate;

use think\Validate;

class Very extends Validate
{
  protected $rule = [
    'captcha' => 'require|captcha'
  ];
}
