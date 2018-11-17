<?php

namespace app\index\controller;

use app\common\model\Behaviors;
use think\Controller;
use think\Request;
use think\facade\Hook;

class Other extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
      $pages="";
      
      $Newpage=Behaviors::where('hook_name','=','Newpage')->where('tai','=','enable')->select();
      if(count($Newpage)){
        $kk="app\\index\\behavior\\".$Newpage[0]['behavior_file'];
        Hook::add('Newpage',$kk);

        if(request()->param('id')){
          $readPage = Hook::listen('Newpage',['command'=>'readPage','id'=>request()->param('id')])[0];
          return distai($readPage);
        }
        else{
          $pages=Hook::listen('Newpage',['command'=>'pages'])[0];
        }
      }
      return view(temproot().'other/index.html',['pages'=>$pages])  ;//
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
