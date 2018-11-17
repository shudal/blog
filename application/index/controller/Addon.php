<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\common\model\Behaviors ;
class Addon extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
      $file=request()->file('addon');
      $homed=phd();
      $info=$file->move('../application/index/behavior','');
      $behavior = new Behaviors;
      $behavior->hook_name = request()->param('hook_name');
      $behavior->behavior_name = request()->param('name');
      $behavior->behavior_file = request()->param('src');
      $behavior->tai = 'disable';
      $behavior->save();
      return view(temproot().'base.html',['distai'=>'插件已安装']);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update()
    {
      $tai = request()->param('tai');
      $addon_id =request()->param('addon_id');
      $addon = Behaviors::where('id','=',$addon_id)->select()[0];
      $rcontent = "插件已卸载";
      if($tai == 'uninstall'){
        exec("cd ".phd()."application/index/behavior && mv ".($addon->behavior_file).".php ~/trash");
        $addon->delete();
              }
      else {
        $addon->tai = $tai;
        $addon->save();
        $rcontent="插件已".$tai ;
      }
      return view(temproot()."base.html",['distai'=>$rcontent]);

    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
