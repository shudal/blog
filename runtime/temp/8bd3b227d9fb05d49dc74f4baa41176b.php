<?php /*a:2:{s:46:"../application/index/view/the1/blog/admin.html";i:1542365262;s:40:"../application/index/view/the1/base.html";i:1542423612;}*/ ?>
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
安装主题：<br>
要求：1）zip压缩包格式。2）内含二目录,static和主题文件夹名。3）详情参考本项目主题the1.zip
<br>
<form action="<?php echo url('index/base/create'); ?>" enctype="multipart/form-data"
  method="post">
  <input type="file" name="theme" /><br>
  <input type="text" name="src" value="主题文件夹名"><br>
  <input type="text" name="name" value="主题名称"><br>
  <input type="submit" value="安装主题"><br></form>
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


  <br><br><br>
插件管理:<br>
    安装:
    <br>注：1）上传文件如Filter.php<br>
<form action="<?php echo url('index/addon/create'); ?>" enctype="multipart/form-data"
  method="post">
  <input type="file" name="addon" /><br>
  <input type="text" name="src" value="// 插件文件名"><br>
  <input type="text" name="name" value="插件名称"><br>
  选择钩子：<br>
  <lable><input name='hook_name' type='radio' value='Filter'>评论过滤</lable> 
  <lable><input name='hook_name' type='radio' value='Validator'>验证器</lable>
  <lable><input name='hook_name' type='radio' value='Classfilter'>分类过滤</lable>
  <lable><input name='hook_name' type='radio' value="Newpage">新增页面</lable>
  <lable><input name='hook_name' type='radio' value='Css'>自定义Css</lable>
  <lable><input name='hook_name' type='radio' value='Stat'>网页统计</lable>
  <br>

  <input type="submit" value='安装插件'><br></form>

<ol>
  <li>
    评论处理插件：<br><br>

    <br>已安装的评论处理插件:<br>
<?php if(!(empty($FilterAddons) || (($FilterAddons instanceof \think\Collection || $FilterAddons instanceof \think\Paginator ) && $FilterAddons->isEmpty()))): foreach($FilterAddons as $addon): ?>
<br><?php echo htmlentities($addon['behavior_name']); ?> 
<form action="<?php echo url('index/addon/update'); ?>" method='post'>
  <lable><input name='tai' type='radio' value='enable'>启用</lable> 
  <lable><input name='tai' type='radio' value='disable'>禁用</lable>
  <lable><input name='tai' type='radio' value='uninstall'>卸载</lable>
  <input type='hidden' name='addon_id' value='<?php echo htmlentities($addon['id']); ?>'>
  <input type='submit' value='确认修改'><br>
</form>当前状态为<?php echo htmlentities($addon['tai']); ?><br>
<?php if($addon['tai']=='enable'): ?>
新增关键词：<br>
<form action="<?php echo url('index/blog/admin'); ?>" method='post'>
  <input type='text' name='unkey'><br>
  <input type='submit' value='提交'>
  <input type='hidden' name='addonClass' value='Filter' >
</form>
  <?php if(!(empty($unkeys) || (($unkeys instanceof \think\Collection || $unkeys instanceof \think\Paginator ) && $unkeys->isEmpty()))): ?>

过滤关键词们: <br>

<br>
<?php foreach($unkeys as $cate): ?>
<br><?php echo htmlentities($cate['keyword']); ?> <a href="<?php echo url('index/blog/admin',['addonClass'=>'Filter','id'=>$cate['id']]); ?>">删除</a>
<br>
<?php endforeach; else: ?>
暂无过滤关键词
<?php endif; endif; endforeach; else: ?>
暂无
<?php endif; ?>
</li>
<li>验证器插件：
  <?php if(!(empty($ValidatorAddons) || (($ValidatorAddons instanceof \think\Collection || $ValidatorAddons instanceof \think\Paginator ) && $ValidatorAddons->isEmpty()))): foreach($ValidatorAddons as $addon): ?>
  <br><?php echo htmlentities($addon['behavior_name']); ?> 
<form action="<?php echo url('index/addon/update'); ?>" method='post'>
  <lable><input name='tai' type='radio' value='enable'>启用</lable> 
  <lable><input name='tai' type='radio' value='disable'>禁用</lable>
  <lable><input name='tai' type='radio' value='uninstall'>卸载</lable>
  <input type='hidden' name='addon_id' value='<?php echo htmlentities($addon['id']); ?>'>
  <input type='submit' value='确认修改'><br>
</form>当前状态为<?php echo htmlentities($addon['tai']); ?><br>
<?php endforeach; else: ?>
  暂无
  <?php endif; ?></li>
<li>分类过滤插件：
  <?php if(!(empty($ClassfilterAddons) || (($ClassfilterAddons instanceof \think\Collection || $ClassfilterAddons instanceof \think\Paginator ) && $ClassfilterAddons->isEmpty()))): foreach($ClassfilterAddons as $addon): ?>
  <br><?php echo htmlentities($addon['behavior_name']); ?> 
<form action="<?php echo url('index/addon/update'); ?>" method='post'>
  <lable><input name='tai' type='radio' value='enable'>启用</lable> 
  <lable><input name='tai' type='radio' value='disable'>禁用</lable>
  <lable><input name='tai' type='radio' value='uninstall'>卸载</lable>
  <input type='hidden' name='addon_id' value='<?php echo htmlentities($addon['id']); ?>'>
  <input type='submit' value='确认修改'><br>
</form>当前状态为<?php echo htmlentities($addon['tai']); ?><br>

<?php if($addon['tai']=='enable'): if(!(empty($cates) || (($cates instanceof \think\Collection || $cates instanceof \think\Paginator ) && $cates->isEmpty()))): ?>

分类们: <br>
<?php foreach($cates as $cate): ?>
<br><?php echo htmlentities($cate['name']); ?> <form action="<?php echo url('index/blog/admin'); ?>" method="post">
<lable><input name='tai' type='radio' value='display'>显示</lable> 
  <lable><input name='tai' type='radio' value='hidden'>隐藏</lable>
  <input type='hidden' name='id' value='<?php echo htmlentities($cate['id']); ?>'>
  <input type='hidden'  name='addonClass' value='Classfilter'>
  <input type='submit' value='确认修改'><br></form>
当前显示状态为<?php echo htmlentities($cate['tai']); ?><br>
<br>
<?php endforeach; endif; endif; endforeach; else: ?>
  暂无
  <?php endif; ?>
</li>
<li>页面管理插件：</li><br>
<?php if(!(empty($newPageAddon) || (($newPageAddon instanceof \think\Collection || $newPageAddon instanceof \think\Paginator ) && $newPageAddon->isEmpty()))): ?>

  <form action="<?php echo url('index/addon/update'); ?>" method='post'>
  <lable><input name='tai' type='radio' value='enable'>启用</lable> 
  <lable><input name='tai' type='radio' value='disable'>禁用</lable>
  <lable><input name='tai' type='radio' value='uninstall'>卸载</lable>
  <input type='hidden' name='addon_id' value='<?php echo htmlentities($newPageAddon['id']); ?>'>
  <input type='submit' value='确认修改'><br>
</form>当前状态为<?php echo htmlentities($newPageAddon['tai']); ?><br>
<?php else: ?>
暂无
  <?php endif; if(!(empty($newPages) || (($newPages instanceof \think\Collection || $newPages instanceof \think\Paginator ) && $newPages->isEmpty()))): ?>

  新增页面：<br>
  <form method="post"  action="<?php echo url('index/blog/admin'); ?>">
  名稱：<h1><input type="text" name="title"></input></h1>
  <input type="hidden" name="command" value="create_newPage"></input>
  内容：<br><textarea  cols="25" rows="10"   name="content"></textarea>
  <br><input type="submit" value="提交"></br>

  </form>
  已有页面：<br>
  <?php if(!(empty($newPages) || (($newPages instanceof \think\Collection || $newPages instanceof \think\Paginator ) && $newPages->isEmpty()))): foreach($newPages as $newPage): ?>
  
  <?php echo htmlentities($newPage['name']); ?> <a href="<?php echo url('index/blog/admin',['command'=>'delete_newPage','id'=>$newPage['id']]); ?>">删除</a> <br>

  <?php endforeach; else: ?>
  暂无页面.
  <?php endif; endif; ?>

  <li>自定义css样式</li>
  <?php if(!(empty($cssAddon) || (($cssAddon instanceof \think\Collection || $cssAddon instanceof \think\Paginator ) && $cssAddon->isEmpty()))): ?>
  <br> <?php echo htmlentities($cssAddon['behavior_name']); ?> :<br>
  <form action="<?php echo url('index/addon/update'); ?>" method='post'>
    <lable><input name='tai' type='radio' value='enable'> 启用</lable>
    <lable><input name='tai' type='radio' value='disable'>禁用</lable>
    <lable><input name='tai' type='radio' value='uninstall'>卸载</lable>
    <input type='hidden' name='addon_id' value='<?php echo htmlentities($cssAddon['id']); ?>'>
    <input type='submit' value='确认修改'><br>
  </form>当前状态为<?php echo htmlentities($cssAddon['tai']); ?><br>
  <?php if($cssAddon['tai']=='enable'): ?>
  新增css样式表：<br>
  <form action='<?php echo url('index/blog/admin'); ?>' method='post'>
    <input type='hidden' name='command' value='newCss'>
    页面名：如"blog/search"<br>
    <input type='text' name='src'><br>
    css:<br>
    <textarea cols='25' rows='5' name='content'></textarea>
      <br>
      <input type='submit' value='新增'><br>
    </form>
    <?php if(!(empty($csses) || (($csses instanceof \think\Collection || $csses instanceof \think\Paginator ) && $csses->isEmpty()))): ?>
    已有的css样式表:<br>
    <?php foreach($csses as $css): ?>
    <br><?php echo htmlentities($css['src']); ?><a
      href="<?php echo url('index/blog/admin',['command'=>'delete','id'=>$css['id']]); ?>" >删除</a><br>
    <?php endforeach; ?>
    <br>
    <?php else: ?>
    暂无css样式表
    <?php endif; ?>
  <br>
  <?php endif; else: ?>
  暂无插件<br>

  <?php endif; ?>
  <li> 网页统计插件：</li><br>
    <?php if(!(empty($statAddon) || (($statAddon instanceof \think\Collection || $statAddon instanceof \think\Paginator ) && $statAddon->isEmpty()))): ?>
    <?php echo htmlentities($statAddon['behavior_name']); ?> :<br>
    <form action="<?php echo url('index/addon/update'); ?>" method="post">
      <lable><input name='tai' type='radio' value='enable'>启用</lable>
      <lable><input name='tai' type='radio' value='disable'>禁用</lable>
      <lable><input name='tai' type='radio' value='uninstall'>卸载</lable>
      <input type='hidden' name='addon_id' value=<?php echo htmlentities($statAddon['id']); ?>>
      <input type='submit' value='确认修改'><br>
    </form>当前状态为<?php echo htmlentities($statAddon['tai']); ?><br>
    <?php else: ?>
    暂无
    <?php endif; ?>
</ol>
