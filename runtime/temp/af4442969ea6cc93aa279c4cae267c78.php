<?php /*a:2:{s:47:"../application/index/view/the1/blog/search.html";i:1542428262;s:40:"../application/index/view/the1/base.html";i:1542423612;}*/ ?>
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
<?php endif; if(!(empty($cuscss) || (($cuscss instanceof \think\Collection || $cuscss instanceof \think\Paginator ) && $cuscss->isEmpty()))): ?>
<?php echo $cuscss; endif; ?>
<br>
<form action="">
搜索内容:<br>
<input type="text" name="cont" value="<?php echo htmlentities($svalue); ?>"><br>
<input type="submit" value="搜索">
</form>

<br><br><br>
<?php if(!(empty($svalue) || (($svalue instanceof \think\Collection || $svalue instanceof \think\Paginator ) && $svalue->isEmpty()))): ?>
&nbsp;&nbsp;<h1>"<?php echo htmlentities($svalue); ?>"的搜索结果:</h1>
<?php foreach($blogs as $blog): ?>
<div class='breblog'>
    <a class='date'><?php echo htmlentities($blog['publish_time']); ?></a><br>
       <?php foreach($blog['name'] as $n): ?>
           <a href="<?php echo url('index/blog/tags',['tag'=>$n]); ?>"
             class="tag"><?php echo htmlentities($n); ?></a>
               &nbsp; <?php endforeach; ?> <div  class="entry-title"><a href =
               "<?php echo url('index/blog/read',['id'=>$blog['id']]); ?>"
                                          class="ti"><?php echo htmlentities($blog['title']); ?></a></div>
                                            <div class='b_content'>
                                               &nbsp;&nbsp;<?php echo $blog['content']; ?>
                                            </div>
                                            </div>
<?php endforeach; else: ?>
暂无搜索结果
<?php endif; ?>
