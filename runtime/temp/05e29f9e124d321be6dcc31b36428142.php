<?php /*a:2:{s:49:"../application/index/view/default/blog/admin.html";i:1541209713;s:43:"../application/index/view/default/base.html";i:1541209713;}*/ ?>
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


<br>
<a href="<?php echo url('index/blog/edit'); ?>">新增文章</a><br>
------编辑始----
<form action="">
搜索文章以编辑:<br>
<input type="text" name="cont" value="<?php echo htmlentities($svalue); ?>"><br>
<input type="submit" value="搜索">
</form>

<br>
<?php if(!(empty($svalue) || (($svalue instanceof \think\Collection || $svalue instanceof \think\Paginator ) && $svalue->isEmpty()))): ?>
<b><?php echo htmlentities($svalue); ?></b>的搜索结果:<br><br><br>
<?php foreach($blogs as $blog): ?>
<b><a href = "<?php echo url('index/blog/read',['id'=>$blog['id']]); ?>" class="ti"><?php echo htmlentities($blog['title']); ?></a></b><br>
标签 :
<?php foreach($blog['name'] as $n): ?>
<a href="<?php echo url('index/blog/tags',['tag'=>$n]); ?>" class="tag"><?php echo htmlentities($n); ?></a> |
<?php endforeach; ?>

<br>
------<br>
<a href="<?php echo url('index/blog/update',['id'=>$blog['id']]); ?>">编辑</a>
<a href="<?php echo url('index/blog/delete',['id'=>$blog['id']]); ?>">删除</a>
<br><?php echo htmlentities($blog['publish_time']); ?><br>
<br><br>
<?php endforeach; else: endif; ?>
------编辑终----<br><br>
主题选项：<br><br>
<?php if(!(empty($themes) || (($themes instanceof \think\Collection || $themes instanceof \think\Paginator ) && $themes->isEmpty()))): ?>
<br><br>更改主题：<br>
<form action="<?php echo url('index/base/update'); ?>" method="post">

<?php foreach($themes as $t): ?>

  <input name="theme" type="radio" value="<?php echo htmlentities($t['src']); ?>"><?php echo htmlentities($t['name']); ?><br>
  <?php endforeach; ?>
  <input type="submit" value="更改"><br>
  </form>
------------
<br><br>删除主题：<br>
<form action="<?php echo url('index/base/delete'); ?>" method="post">

<?php foreach($themes as $t): ?>
  <input name="theme" type="radio" value="<?php echo htmlentities($t['src']); ?>"><?php echo htmlentities($t['name']); ?><br>
  <?php endforeach; ?>
  <input type="submit" value="删除"><br>
  </form>
  <?php endif; ?>
