<?php /*a:2:{s:58:"/home/perci/tp/tp5/application/index/view/blog/update.html";i:1540781157;s:35:"../application/index/view/base.html";i:1540736418;}*/ ?>
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


<br><br><br>
<?php if(!(empty($blog) || (($blog instanceof \think\Collection || $blog instanceof \think\Paginator ) && $blog->isEmpty()))): ?>
<form method="post" action="<?php echo url('index/blog/save'); ?>">
  <h1><input type="text" name="title" value="<?php echo htmlentities($blog['title']); ?>"></h1>
  <input type="hidden" name="id" value="<?php echo htmlentities($blog['id']); ?>">
---------------------------<br>

<div>发布:<?php echo htmlentities($blog['publish_time']); ?></div><br/>
<div>分类:<?php echo htmlentities($blog['category']); ?></div><br/>
<div>标签：<input type="text" name="tags" value="<?php echo htmlentities($blog['name']); ?>"></div><br/>
  <textarea cols="100" rows="10" name="content"><?php echo htmlentities($blog['content']); ?></textarea>
</div>
<br><input type="submit" value="提交修改"><br></form>
<?php else: if(!(empty($tai) || (($tai instanceof \think\Collection || $tai instanceof \think\Paginator ) && $tai->isEmpty()))): ?>
  <?php echo htmlentities($tai); else: ?> 不存在的博文

 <?php endif; endif; ?>
