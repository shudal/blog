<?php

namespace app\index\controller;
use app\common\model\Comments as CommentsModel;
use app\common\model\Base as BaseModel;
use think\Controller;
use think\Request;
class Comments extends Controller
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
      $tai='无效评论';
      if(request()->param('comments')){
        $cpat = request()->param('captcha');
        $validate= new \app\index\validate\Very;
        $data = ['captcha'=>$cpat ,];
        
        if(!$validate->check($data)){
          return distai('验证码错误..');
        }
        /*
        if(!captcha_check($cpat))
          return distai('验证码错误...');
         */

        $comment = new CommentsModel;
        $comment->content=request()->param('comments');
        $comment->blog_id=request()->param('blog_id');
        $comment->user_name=request()->param('user_name');
        $comment->save();
        $tai='评论成功';
      }
      $this->assign('tai',$tai);
      return $this->fetch("../application/index/view/".BaseModel::where('tai','=','now')->field('src')->select()[0]->src."/comments/create.html");
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
