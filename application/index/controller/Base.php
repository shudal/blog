<?php

namespace app\index\controller;
use app\common\model\Base as BaseModel;
use think\Controller;
use think\Request;

class Base extends Controller
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
      $file=request()->file('theme');
      $homed=phd();

      exec("rm -rf $homed"."application/index/upload/*");

      $info=$file->move('../application/index/upload','');

      $t_src=request()->param('src');
      $t_name=request()->param('name');

      
            exec("cd $homed"."application/index/upload && unzip $t_src".".zip && cd $t_src  && cp -r $t_src ../../view/ && mkdir $homed"."public/$t_src && cp -r static $homed"."public/$t_src");

      $theme =new BaseModel;
      $theme->name =$t_name;
      $theme->type ='theme';
      $theme->src  =$t_src;
      $theme->tai  ='no';
      $theme->save();
      $tai="安装失败";
      if($info){
        $tai="安装成功";
      }
      $this->assign('tai',$tai);
      return $this->fetch("../application/index/view/".BaseModel::where('tai','=','now')->field('src')->select()[0]->src."/base/tai.html");

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
      $tn=request()->param('theme');
      $now_theme=BaseModel::where('tai','now')->find();
      $now_theme->tai='no';
      $now_theme->save();

      $c_the=BaseModel::where('type','theme')->where('src',$tn)->find();
      $c_the->tai='now';
      $c_the->save();
      $this->assign('tai','更改成功');
      return $this->fetch("../application/index/view/".BaseModel::where('tai','=','now')->field('src')->select()[0]->src."/base/tai.html");



    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {
      $name = request()->param('theme');
      $dthe=BaseModel::where('src','=',$name)->delete();

      $homed=phd();
      exec("rm -rf $homed"."application/index/view/$name");
      exec("rm -rf $homed"."public/$name");
      $this->assign('tai','删除成功');
      return $this->fetch("../application/index/view/".BaseModel::where('tai','=','now')->field('src')->select()[0]->src."/base/tai.html");
    }
}
