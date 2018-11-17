<?php /*a:2:{s:49:"../application/index/view/default/blog/regis.html";i:1540993872;s:43:"../application/index/view/default/base.html";i:1540994238;}*/ ?>
<title>Perci</title>
<link rel="stylesheet" type="text/css" href="/static/css/style.css" />
<style>
#ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
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


<form action="<?php echo url('index/blog/regis'); ?>" method="post">
  用户名:<br>
  <input type="text" name="username" value="//英文 数字 下划线6-20位"></input><br>
  <input type="password" name="password"></input><br>
  <input type="submit" value="注册">
</form>
<?php if(!(empty($tai) || (($tai instanceof \think\Collection || $tai instanceof \think\Paginator ) && $tai->isEmpty()))): ?>
<?php echo htmlentities($tai); endif; ?>
