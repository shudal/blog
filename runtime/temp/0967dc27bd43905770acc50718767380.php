<?php /*a:2:{s:48:"../application/index/view/default/blog/edit.html";i:1540993809;s:43:"../application/index/view/default/base.html";i:1540994238;}*/ ?>
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


<form method="post" action="<?php echo url('index/blog/save'); ?>">
  标题：<h1><input type="text" name="title"> </input></h1>
  分类：<br> <input type="radio" name="category" value="0">玩耍<br>
  <input type="radio" name="category" value="1">编程<br>
  <br>
  标签：<input type="text" name="tags"><br>
  内容：<br><textarea cols="100" rows="10" name="content"></textarea>
  <br><input type="submit" value="提交"><br>
