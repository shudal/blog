<?php
namespace app\index\controller;
use think\Controller;
use app\common\model\Blog as BlogModel;
use think\facade\Hook;
class Index extends Controller
{
    
    public function index()
    {
      Hook::add('Test','app\\index\\behavior\\Test');
      $ka=Hook::listen('Test')[0]['la'];

      $Test = new \plug\Test();
      $extendTest= $Test->sayHello();

      $blogs = BlogModel::whereTime('publish_time','month')->where('tai','=','display')->field('id,name,title,content,publish_time')->order('id','desc')->select();
      for($x=0;$x<count($blogs);$x++){
        $blogs[$x]->name = explode(',',$blogs[$x]->name);
        $str_cut = $blogs[$x]->content;
        if(strlen($str_cut)>20)
          $blogs[$x]->content = mb_substr($str_cut,0,20).'...';
      }
      $this->assign(['ka'=>$ka,'extendTest'=>$extendTest,'blogs'=>$blogs]);
    	return view(temproot().'index/index.html');
  }
}
        
        
