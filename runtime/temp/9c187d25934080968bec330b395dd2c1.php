<?php /*a:2:{s:46:"../application/index/view/the1/blog/about.html";i:1541051187;s:40:"../application/index/view/the1/base.html";i:1542268475;}*/ ?>
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
<li id="li"><a href="<?php echo url('index/blog/rindex'); ?>" id="a">博文</a></li>
<li id="li"><a href="<?php echo url('index/blog/search'); ?>" id="a">搜索</a></li>
<li id="li"><a href="<?php echo url('index/other/index'); ?>" id="a">其他</a><li>
</ul><br><br>
<?php if(!(empty($distai) || (($distai instanceof \think\Collection || $distai instanceof \think\Paginator ) && $distai->isEmpty()))): ?>
<?php echo htmlentities($distai); endif; if(!(empty($tm) || (($tm instanceof \think\Collection || $tm instanceof \think\Paginator ) && $tm->isEmpty()))): ?>
hi;
<?php endif; ?>

关于<br>



<br><br><br>
<a href="<?php echo url('index/blog/login'); ?>">登陆</a>
<a href="<?php echo url('index/blog/regis'); ?>">注册</a>
