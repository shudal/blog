<?php /*a:3:{s:45:"../application/index/view/the1/blog/read.html";i:1542447372;s:40:"../application/index/view/the1/base.html";i:1542423612;s:29:"the1/static/css/blog_read.css";i:1542427828;}*/ ?>
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

<style>
body{
  background:url('https://perci-1253331419.cos.ap-chengdu.myqcloud.com/tp/Attack.on.Titan.full.1503541.jpg');
  background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%;
}
.read_title{
  font-size:xx-large;
  text-align:center;
  font-family:宋体;
}
</style>

<div class='page'>
<?php if(!(empty($blog) || (($blog instanceof \think\Collection || $blog instanceof \think\Paginator ) && $blog->isEmpty()))): ?>
<div class='read_title'><?php echo htmlentities($blog['title']); ?></div>
<a class='date'><?php echo htmlentities($blog['publish_time']); ?></a><br>
<?php foreach($blog['name'] as $n): ?>
<a href="<?php echo url('index/blog/tags',['tag'=>$n]); ?>" class="tag"><?php echo htmlentities($n); ?></a>
    &nbsp; 
<?php endforeach; ?><br>
<?php if(!(empty($sum) || (($sum instanceof \think\Collection || $sum instanceof \think\Paginator ) && $sum->isEmpty()))): ?>
游览：<?php echo htmlentities($sum); endif; ?>
<br>分类:<a href="<?php echo url('index/blog/index',['category_id'=>$blog['category_id']]); ?>"><?php echo htmlentities($blog['category']); ?></a>
<div class='read_content'><?php echo $rcontent; ?></div>
<?php endif; ?>


<br><br><br>
<?php if(!(empty($comments) || (($comments instanceof \think\Collection || $comments instanceof \think\Paginator ) && $comments->isEmpty()))): foreach($comments as $comment): ?>
  <?php echo htmlentities($comment['user_name']); ?>：<i><?php echo htmlentities($comment['publish_time']); ?></i><br>
    <i><?php echo htmlentities($comment['content']); ?></i><br><br>

    <?php endforeach; else: ?>
暂无评论
<?php endif; ?>

<br><br>

<?php if(!(empty($disu) || (($disu instanceof \think\Collection || $disu instanceof \think\Paginator ) && $disu->isEmpty()))): ?>
<?php echo htmlentities($disu); ?> :
<form action="<?php echo url('index/comments/create'); ?>" method="post">
  <input type="hidden" name="blog_id" value="<?php echo htmlentities($blog['id']); ?>">
  <input type="hidden" name="user_name" value="<?php echo htmlentities($disu); ?>"><br>
    <textarea name='comments' cols="30" rows="10">//评论内容</textarea><br>
    验证码:<br>
    <div><?php echo captcha_img(); ?></div>
  <input type="text" name="captcha"><br>

  <input type="submit" value="提交评论"><br>
</form>
<?php else: ?>
登陆后可评论
<?php endif; ?>
</div>
