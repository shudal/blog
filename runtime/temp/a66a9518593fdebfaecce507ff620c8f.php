<?php /*a:5:{s:46:"../application/index/view/the1/blog/login.html";i:1541216999;s:32:"../application/index/view/b.html";i:1541229766;s:60:"/home/perci/tp/tp5/application/index/view/public/header.html";i:1541229894;s:40:"../application/index/view/the1/base.html";i:1541218979;s:60:"/home/perci/tp/tp5/application/index/view/public/footer.html";i:1541229914;}*/ ?>
iihhhh

<title>Perci</title>
<link rel="stylesheet" type="text/css" href="/the1/static/css/style.css" />
<style>
#ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #CDC8B1;
}
 
#ul li {
    float: left;
}
 
ul li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
 
/*鼠标移动到选项上修改背景颜色 */

#a:hover {
    background-color: #111;
}
</style>
<ul id="ul">
<li id="li"><a id ="a" href="/">首页</a></li>
<li id="li"><a href="<?php echo url('index/blog/index',['class'=>'play']); ?>" id="a">玩耍</a></li>
<li id="li"><a href="<?php echo url('index/blog/index',['class'=>'pro']); ?>" id="a">编程</a></li>
<li id="li"><a href="<?php echo url('index/blog/search'); ?>" id="a">搜索</a></li>
<li id="li"><a href="<?php echo url('index/blog/about'); ?>" id="a">关于</a><li>
</ul><br><br>
<?php if(!(empty($distai) || (($distai instanceof \think\Collection || $distai instanceof \think\Paginator ) && $distai->isEmpty()))): ?>
<?php echo htmlentities($distai); endif; if(!(empty($tai) || (($tai instanceof \think\Collection || $tai instanceof \think\Paginator ) && $tai->isEmpty()))): ?>
管理登陆:
<br>
<form action="" method="post">
<p>账号:<br>
<input type="text" name="username" value="" /></p>
<p>密码:<br><input type="password" name="password" ></p>
<p>验证码:<br><input type="text" name="captcha"></p> 
<div><?php echo captcha_img(); ?></div>
<input type="submit" value="登陆" />
</form>
<?php endif; if(!(empty($txt) || (($txt instanceof \think\Collection || $txt instanceof \think\Paginator ) && $txt->isEmpty()))): ?>
<?php echo htmlentities($txt); endif; ?>

ffffffffffffff

