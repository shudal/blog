<?php /*a:2:{s:56:"/home/perci/tp/tp5/application/index/view/blog/read.html";i:1540820055;s:35:"../application/index/view/base.html";i:1540736418;}*/ ?>
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
<h1><?php echo htmlentities($blog['title']); ?></h1>
---------------------------<br>
<div>发布:<?php echo htmlentities($blog['publish_time']); ?></div><br/>
<div>分类:<?php echo htmlentities($blog['category']); ?></div><br/>
<div>标签：<?php echo htmlentities($blog['name']); ?></div><br/>
<div>内容：<?php echo htmlentities($blog['content']); ?></div>
<?php endif; ?>

<br><br><br>
---评论分割线---<br><br><br>
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
  <input type="hidden" name="user_name" value="<?php echo htmlentities($disu); ?>">
  <textarea name='comments' cols="30" rows="10">//评论内容</textarea><br>
  <input type="submit" value="提交评论"><br>
</form>
<?php else: ?>
登陆后可评论
<?php endif; ?>

