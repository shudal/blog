<?php

namespace app\index\controller;
use app\common\model\Blog as  BlogModel;
use app\common\model\Users as UsersModel;
use app\common\model\Comments as CommentsModel;
use app\common\model\Base as BaseModel;
use app\common\model\Addon as AddonModel;
use app\common\model\Categories;
use app\common\model\Behaviors ;
use app\common\model\Css as CssModel;
use think\Controller;
use think\Request;
use think\facade\Session;
use think\facade\Hook;

/*
 *插件和主题数据都存储在Base表中，`tai`为’now'的是当前使用的主题.
 */

/**
 *@route('blog')
 */
class Blog extends Controller
{
  /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function rindex(){
      $cates = Categories::all();
      $classfilters= Behaviors::where('hook_name','=','Classfilter')->where('tai','=','enable')->field('behavior_file')->select();
      if(count($classfilters)){
        $kk = "app\\index\\behavior\\".$classfilters[0]['behavior_file'];
        Hook::add('Classfilter',$kk);
        $cates = Hook::listen('Classfilter','index')[0];
      }
    
      $this->assign('cates',$cates);
      return $this->fetch(temproot()."blog/rindex.html");
    }
    public function index()
    {
	$blogs=BlogModel::where('category_id','=',request()->param('category_id'))->where('tai','=','display')
		->field('id,name,title,content,publish_time')
		->order('id','desc')
		->select();
	for($x=0;$x < count($blogs);$x++){
    $blogs[$x]->name=explode(',',$blogs[$x]->name);
    $str_cut = $blogs[$x]->content;
    if(strlen($str_cut)>20)
      $blogs[$x]->content = mb_substr($str_cut,0,20).'...';

	}
	$this->assign('blogs',$blogs);
  return $this->fetch(temproot()."blog/index.html");

    }
	/**
	 *@return \think\Response
	 */
	public function tags(){
		$tag=request()->param('tag');
		$blogs=BlogModel::where('name','like',"%$tag%")
		->field('id,name,content,title,publish_time')
                ->order('id','desc')
                ->select();
        $arrl=count($blogs);
        for($x=0;$x<$arrl;$x++){
          $blogs[$x]->name=explode(',',$blogs[$x]->name);
          if(strlen($blogs[$x]->content)>20)
            $blogs[$x]->content = mb_substr($blogs[$x]->content,0,20);
        }

        $this->assign(['blogs'=>$blogs,'tag'=>$tag]);
        return $this->fetch(temproot()."blog/tags.html");
	}
	public function search(){
		$cont=request()->param('cont');
		$blogs=BlogModel::where('content','like',"%$cont%")
			->field('id,name,title,content,publish_time')
                ->order('id','desc')
                ->select();
        $arrl=count($blogs);
        for($x=0;$x<$arrl;$x++){
          $blogs[$x]->name=explode(',',$blogs[$x]->name);
          $str_cut = $blogs[$x]->content;
          if(strlen($str_cut)>20)
            $blogs[$x]->content = mb_substr($str_cut,0,20).'...';

        }
        
        $cssAddons = Behaviors::where('hook_name','=','Css')->where('tai','=','enable')->select();
        $cuscss="";
        if(count($cssAddons)){
          $kk= "app\\index\\behavior\\".$cssAddons[0]['behavior_file'];
          Hook::add('Css',$kk);

          $cuscss=Hook::listen('Css','blog/search')[0];

        }
        $this->assign(['blogs'=>$blogs,'cuscss'=>$cuscss,'svalue'=>$cont]);
        	return $this->fetch(temproot()."blog/search.html");
        }
	public function about(){
		return $this->fetch(temproot()."blog/about.html");
	}
	public function login(){
		if(!Session::has('user')){ #未设置session,也就是未登录
			if(!request()->param('username')){
        $tai="1"; #1时显示登录表单i

        $validators = Behaviors::where('hook_name','=','Validator')->where('tai','=','enable')->field('behavior_file')->select();
        if(count($validators)){
          $kk= "app\\index\\behavior\\".$validators[0]['behavior_file'];
          Hook::add('Validator',$kk);

          /*
          $v_src = "\\"."plug"."\\".$validators[0]['behavior_file']."()";
          dump($v_src);
          // $validator = new $v_src;
          $validator  = new \plug\Captcha();
           */
          
        }
        $validator_entry="";
        if(count($validators))
          $validator_entry = Hook::listen('Validator','entry')[0];
			  $this->assign(['tai'=>$tai,'validator_entry'=>$validator_entry]);
			  return $this->fetch(temproot()."blog/login.html");
			}
      else{
        /*
        if(!captcha_check($captcha)){
          return '验证码错误';
        }
         */

        $username=request()->param('username');
        $password=request()->param('password');
        $data=[
          'username'=>$username,
          'password'=>$password,  
        ];

        $validation_tai ='success';
        $validators = Behaviors::where('hook_name','=','Validator')->where('tai','=','enable')->field('behavior_file')->select();
        if(count($validators)){
          $kk= "app\\index\\behavior\\".$validators[0]['behavior_file'];
          Hook::add('Validator',$kk);

          /*
          $v_src = "\\"."plug"."\\".$validators[0]['behavior_file']."()";
          dump($v_src);
          // $validator = new $v_src;
          $validator  = new \plug\Captcha();
           
           */

          $v_input = request()->param('validation_input');
          $validation_tai = Hook::listen('Validator',$v_input)[0];
          
        }
        if($validation_tai == 'failure'){
          return view(temproot().'base.html',['distai'=>'不正确的验证码..']);
        }

                /* 验证码验证
        $cpat    =request()->param('captcha');
        if(!captcha_check($cpat)){
          $this->assign(['txt'=>'验证码错误...','tai'=>'1']);
					return $this->fetch(temproot()."blog/login.html");

        }

         */

        $validate = new \app\index\validate\User;
       
        if(!$validate->check($data)){
          $this->assign(['txt'=>'用户名或密码或不符规或不存在或出错','tai'=>'1']);
					return $this->fetch(temproot()."blog/login.html");
        }
 

				$user=UsersModel::where('username','=',$username)
					->field('password,pri')
					->select();
				if(count($user)){
					if($user[0]->password==md5($password)){
						Session::set('user',$username);
						Session::set('pri',$user[0]->pri);
						if($user[0]->pri=='admin') return redirect(url('index/blog/admin'));
						else {
						$this->assign(['txt'=>"$username 成功登陆",'tai'=>'1']);
						return $this->fetch(temproot()."blog/login.html");
						}
					}
          else {
            return distai('密码错误');
						}
				}
				else {
					$this->assign(['txt'=>'不存在的用户名','tai'=>'1']);
					
					return $this->fetch(temproot()."blog/login.html");
					}
			}
		}
    else{
      if(Session::get('pri')=='admin') return redirect(url('index/blog/admin'));

			$this->assign(['txt'=>'已经登陆过了','tai'=>'1']);
			return $this->fetch(temproot()."blog/login.html");
		}
	}
	public function admin(){
		if(Session::get('pri')=='admin'){
			$cont=request()->param('cont');
                $blogs=BlogModel::where('content','like',"%$cont%")
                        ->field('id,name,title,publish_time')
                ->order('id','desc')
                ->select();
        $arrl=count($blogs);
        for($x=0;$x<$arrl;$x++){
                $blogs[$x]->name=explode(',',$blogs[$x]->name);
        }
        //$FilterAddons="";
        //这里不需要筛选出启用的插件
        $FilterAddons = Behaviors::where("hook_name","=","Filter")->field('id,behavior_name,behavior_file,tai')->select(); 
        $unkeys='';
        if(count($FilterAddons)){
          $kk= "app\\index\\behavior\\".$FilterAddons[0]['behavior_file'];
          Hook::add('Filter',$kk);
          $unkeys = Hook::listen('Filter','admin')[0];
          
          if(request()->param('addonClass')=='Filter'){
            if(request()->param('unkey')){
              $tai= Hook::listen('Filter',['command'=>'create','unkey'=> request()->param('unkey')])[0];
              return distai($tai);
            }
            else{
            $tai = Hook::listen('Filter',['command'=>'delete','id'=>request()->param('id')])[0];
            return distai($tai);
            }
          }
        }


        $ValidatorAddons = Behaviors::where('hook_name','=','Validator')->field('id,behavior_name,tai')->select();
        $cates = "";
        $ClassfilterAddons = Behaviors::where('hook_name','=','Classfilter')->field('id,behavior_name,behavior_file,tai')->select();
         if(count($ClassfilterAddons)){
          $kk= "app\\index\\behavior\\".$ClassfilterAddons[0]['behavior_file'];
          Hook::add('Classfilter',$kk);
          $cates = Hook::listen('Classfilter','admin')[0];

          if(request()->param('addonClass')=='Classfilter'){
            $tai = Hook::listen('Classfilter',['id'=>request()->param('id'),'tai'=>request()->param('tai')])[0];
            return distai($tai);
          }

         }

        $NewPageAddons =Behaviors::where('hook_name','=','Newpage')->where('tai','=','enable')->field('id,behavior_name,behavior_file,tai')->select();
        $newPages="";
        if(count($NewPageAddons)){
          $kk="app\\index\\behavior\\".$NewPageAddons[0]['behavior_file'];
          Hook::add('Newpage',$kk);

          $NewPageAddons = $NewPageAddons[0];
          if(request()->param('command')){
            if(request()->param('command')=='delete_newPage'){
              distai(Hook::listen('Newpage',['command'=>'delete_newPage','id'=>request()->param('id')])[0]);
            }
            else if(request()->param('command')=='edit_newPage'){
              return Hook::listen('Newpage',['command'=>'edit_newPage','id'=>request()->param('id')])[0]; 
            }
            else if(request()->param('command')=='create_newPage'){
              return Hook::listen('Newpage',['command'=>'create_newPage','title'=>request()->param('title'),'content'=>request()->param('content')])[0];
            }
          }

          $newPages = Hook::listen('Newpage',['command'=>'admin_entry'])[0];
        }
        else if(count(Behaviors::where('hook_name','=','Newpage')->select())==0){
          $NewPageAddons="";
        
        }
        else {
          $NewPageAddons = Behaviors::where('hook_name','=','Newpage')->select()[0];
        }

        $themes=BaseModel::where('type','=','theme')->field('name,src,tai')->select();

        $cssAddons = Behaviors::where('hook_name','=','Css')->select();
        $cssAddon = "";$csses="";
        if(count($cssAddons)){
          $kk="app\\index\\behavior\\".$cssAddons[0]['behavior_file'];
          Hook::add('Css',$kk);

          $cssAddon=$cssAddons[0];
    
          $csses=Hook::listen('Css','csses')[0];
          
          if(request()->param('command')=='newCss'){
            $discont=  Hook::listen('Css',['command'=>'newCss','src'=>request()->param('src'),'content'=>$_POST['content']]);
            return distai($discont[0]);
          }
          else if(request()->param('command')=='delete'){
            $discont= Hook::listen('Css',['command'=>'delete','id'=>request()->param('id')])[0];
            return distai($discont);
          }

        }

        $statAddons=Behaviors::where('hook_name','=','Stat')->select();
        $statAddon="";
        if(count($statAddons)){
          $kk="app\\index\\behavior\\".$statAddons[0]['behavior_file'];
          Hook::add('Stat',$kk);
          $statAddon = $statAddons[0];
        }
        
        $this->assign(['statAddon'=>$statAddon,'csses'=>$csses,'cssAddon'=>$cssAddon,'newPageAddon'=>$NewPageAddons,'blogs'=>$blogs,'svalue'=>$cont,'themes'=>$themes,'FilterAddons'=>$FilterAddons,'ValidatorAddons'=>$ValidatorAddons,'ClassfilterAddons'=>$ClassfilterAddons,'cates'=>$cates,'unkeys'=>$unkeys,'newPages'=>$newPages]);
          
			  return $this->fetch(temproot()."blog/admin.html");
	}	
		return '非法请求...';
	}
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function regis()
    {
      if(request()->param('username')){
        $tai='注册成功';
        $username= request()->param('username');
        $password= request()->param('password');
        if(!preg_match("/^[\w\_]{6,20}$/u",$username)) $tai='非法用户名';
        else{
        $user = new UsersModel;
        $user->username=$username;
        $user->pri='visitor';
        $user->password=  md5($password);
        $user->save();
        }
        
        $this->assign('tai',$tai);
      }
      return $this->fetch(temproot()."blog/regis.html");
	}

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
      if(request()->param('id')){
      $id = request()->param('id');
      $blog=BlogModel::get($id);
      $blog->title= request()->param('title');
      $blog->name = request()->param('tags');
      $blog->content= $_POST['content'];
      $blog->save();
      $this->assign('tai','更新成功');
      return $this->fetch(temproot()."blog/update.html");
      }
      else if(request()->param('title')){
        $blog = new BlogModel;
        $blog->title=request()->param('title');
        $blog->name=request()->param('tags');
        $blog->content=request()->param('content');
        $blog->category_id=request()->param('category');
        $blog->tai='display';
        $blog->save();
        $this->assign('tai','新增成功');
        return $this->fetch(temproot()."blog/update.html");
      }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read()
    {

      $id = request()->param('id');

      $statAddons = Behaviors::where('hook_name','=','Stat')->where('tai','=','enable')->select();
      $sum="";
      if(count($statAddons)){
        $kk= "app\\index\\behavior\\".$statAddons[0]['behavior_file'];
        Hook::add('Stat',$kk);

        Hook::listen('Stat',['command'=>'add','type'=>'blog','id'=>$id]);
        $sum = Hook::listen('Stat',['command'=>'get','type'=>'blog','id'=>$id])[0];

      }
      	$blog= BlogModel::get($id);
	if($blog){
		$categories = [0=>'玩耍',1=>'编程'];
    $blog->category = $categories[$blog->category_id];
    $blog->name=explode(',',$blog->name);
    $parser = new \HyperDown\Parser;
    $rcontent = $blog->content;
    $rcontent = $parser->makeHtml($rcontent);
    $this->assign(['blog'=>$blog,'rcontent'=>$rcontent]);
  }
  $disu='';

  $comments= CommentsModel::where('blog_id','=',$id)
    ->field('content,user_name,publish_time')
    ->order('id')
    ->select();

  $filters = Behaviors::where('hook_name','=','Filter')->where('tai','=','enable')->field('behavior_file')->select();
  if(count($filters)){
  for($i=0;$i!=count($filters);$i++){
    $kk= "app\\index\\behavior\\".$filters[$i]['behavior_file'];
    Hook::add('Filter',$kk);
    $comments=Hook::listen('Filter',$comments)[0];

  }
    }
  if(Session::has('user')){
  $disu=Session::get('user');
  }
	$this->assign(['sum'=>$sum,'blog'=>$blog,'disu'=>$disu,'comments'=>$comments]);
	return $this->fetch(temproot()."blog/read.html");
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit()
    {
      return $this->fetch(temproot()."blog/edit.html");
    }

    /**
     * 保存更新的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function update()
    {
	$id=request()->param('id');
        $blog=BlogModel::get($id);
	if($blog){
                $categories = [0=>'玩耍',1=>'编程'];
                $blog->category = $categories[$blog->category_id];
}
        $this->assign('blog',$blog);
        return $this->fetch(temproot()."blog/update.html");
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {
      $tai="尝试删除不存在的博文ing";
      if(request()->param('id')){
        $blog=BlogModel::get(request()->param('id'));
        $blog->delete();
        $tai="删除成功";
      }
      $this->assign('tai',$tai);
      return $this->fetch(temproot()."blog/update.html");
    }

}
