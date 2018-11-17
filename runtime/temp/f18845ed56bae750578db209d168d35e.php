<?php /*a:5:{s:47:"../application/index/view/the1/index/index.html";i:1541211998;s:32:"../application/index/view/b.html";i:1541229766;s:60:"/home/perci/tp/tp5/application/index/view/public/header.html";i:1541229894;s:40:"../application/index/view/the1/base.html";i:1541218979;s:60:"/home/perci/tp/tp5/application/index/view/public/footer.html";i:1541229914;}*/ ?>
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
<?php echo htmlentities($distai); endif; ?>


<br>
此为首页
<?php if(empty($tai) || (($tai instanceof \think\Collection || $tai instanceof \think\Paginator ) && $tai->isEmpty())): ?>
ka
<?php endif; if(!(empty($ka) || (($ka instanceof \think\Collection || $ka instanceof \think\Paginator ) && $ka->isEmpty()))): ?>
<?php echo htmlentities($ka); endif; ?>

<?php echo phd(); ?>
<br>
<?php echo temproot(); ?>

ffffffffffffff

