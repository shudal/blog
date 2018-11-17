<?php /*a:2:{s:46:"../application/index/view/the1/blog/login.html";i:1541321250;s:40:"../application/index/view/the1/base.html";i:1542423612;}*/ ?>
<title>Perci</title>
<link rel="stylesheet" type="text/css" href="/the1/static/css/style.css" />
<style>
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
<ul class='menu'>
<li class='menu-list'><a class='menu-item' id ="a" href="/">最近</a></li>
<li class='menu-list'><a class='menu-item' href="<?php echo url('index/blog/rindex'); ?>" id="a">博文</a></li>
<li class='menu-list'><a class='menu-item' href="<?php echo url('index/blog/search'); ?>" id="a">搜索</a></li>
<li class='menu-list'><a class='menu-item' href="<?php echo url('index/other/index'); ?>" id="a">其他</a><li>
</ul><br><br>
<?php if(!(empty($distai) || (($distai instanceof \think\Collection || $distai instanceof \think\Paginator ) && $distai->isEmpty()))): ?>
<?php echo htmlentities($distai); endif; if(!(empty($tm) || (($tm instanceof \think\Collection || $tm instanceof \think\Paginator ) && $tm->isEmpty()))): ?>
hi;
<?php endif; if(!(empty($tai) || (($tai instanceof \think\Collection || $tai instanceof \think\Paginator ) && $tai->isEmpty()))): ?>
管理登陆:
<br>
<form action="" method="post">
<p>账号:<br>
<input type="text" name="username" value="" /></p>
<p>密码:<br><input type="password" name="password" ></p>


<?php if(!(empty($validator_entry) || (($validator_entry instanceof \think\Collection || $validator_entry instanceof \think\Paginator ) && $validator_entry->isEmpty()))): ?>
<p>验证码:<br><input type="text" name="validation_input"></p> 
<?php echo $validator_entry; endif; ?>


<input type="submit" value="登陆" />
</form>
<?php endif; if(!(empty($txt) || (($txt instanceof \think\Collection || $txt instanceof \think\Paginator ) && $txt->isEmpty()))): ?>
<?php echo htmlentities($txt); endif; ?>
