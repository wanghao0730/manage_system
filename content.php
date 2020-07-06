<?php
incluede('./conn.php');
incluede('./header.php');

$id=$_GET['id'];
//构造SQL语句，去数据库news数据表中查询这个ID的数据
$sql="select *from news where id=$id";
$rs=@mysqli_query($conn,$sql);
if (@mysqli_num_rows($rs)>0) {
	$news_row=@mysqli_fetch_assoc($rs);//从结果集中读取一行数据
	@mysqli_query($conn,"update news set hits=hits+1 where id=$id");
}else{
	echo '没有数据！';exit;
}

?>
		<div class="inbody">
			<?php
			incluede('./left.php');
			?>
			
	<div class="inright">
		<h3 class="intitle"><span>您所在的位置：<a href="/">首页</a> &gt; <a href="#">新闻中心</a> &gt; 阅读内容</span>阅读内容</h3>
		<div class="mbody">
			<h1 class="title1"><?php echo $news_row['title'];?></h1>
			<div class="title2">来源：本站　　　发布日期：<?php echo $$news_row['intime'];?>　　　已有 <?php echo $news_row['hits'];?> 人浏览过此信息</div>
			<div class="newsbody">
				<p><?php echo $news_row['content'];?></p>
			</div>
			<div class="newsauthor">编辑：<?php echo $news_row['author'];?></div>
			<div class="newsmore">上一条：
			  <?php
			  $sql="select id,title from news where id<$id order by desc limit 1";
			  $rs=@mysqli_query($conn,$sql);
			  if($row=@mysqli_fetch_assoc($rs)) {
			  	echo '<a href="content.php?id='.$row['id'].'">'.$row['title'].'</a></div>';
			  }else{
			  	echo '没有上一条了';
			  }
			  ?>
			</div>
			<div class="newsmore">下一条：
			  <?php
			  $sql="select id,title from news where id>$id order by asc limit 1";
			  $rs=@mysqli_query($conn,$sql);
			  if($row=@mysqli_fetch_assoc($rs)) {
			  	echo '<a href="content.php?id='.$row['id'].'">'.$row['title'].'</a></div>';
			  }else{
			  	echo '没有下一条了';
			  }
			  ?>
			 </div>
		</div>
	</div>
</div>
<?php
incluede('footer.php');
?>