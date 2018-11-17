<?php /*a:2:{s:47:"../application/index/view/the1/blog/update.html";i:1541051394;s:40:"../application/index/view/the1/base.html";i:1542423612;}*/ ?>
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
<?php endif; ?>

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
